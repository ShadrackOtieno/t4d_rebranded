<?php

namespace App\Http\Controllers\Backoffice\Payment;

use App\Course;
use App\Currency;
use App\GroupRegistrationParticipants;
use App\Jobs\InvoiceCreationProcess;
use App\Payment;
use App\Company;
use App\ApprovedAuthority;
use App\Customer;
use App\CourseBooking;
use App\City;
use App\Http\Controllers\Controller;
use App\PhysicalClass;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Session;
use PDF;
use App\Mail\Course\InvoiceCreationMail as CustomerBookingMail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $payments = Payment::when($request->search, function ($query, $search) {
            $query->where( function ($query) use ($search) {
                $query->where('id', 'like', "$search%")
                    ->orWhereHasMorph('item', 'App\CourseBooking', function ($query) use ($search) {
                    $query->whereHas('course', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
                })->orWhereHasMorph('item', 'App\TourBooking', function ($query) use ($search) {
                    $query->where('id', 'like', "$search%")
                        ->whereHas('tour', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
                })->orWhereHasMorph('item', 'App\SoftwareQuotation', function ($query) use ($search) {
                    $query->where('id', 'like', "$search%")
                        ->whereHas('software', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
                })->orWhereHasMorph('item', 'App\CertificationBooking', function ($query) use ($search) {
                    $query->where('id', 'like', "$search%")
                        ->whereHas('certification', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
                })->orWhereHasMorph('item', 'App\CertificationBooking', function ($query) use ($search) {
                    $query->where('id', 'like', "$search%")
                        ->whereHas('certification', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
                })->orWhereHasMorph('item', 'App\CertificationBundleBooking', function ($query) use ($search) {
                    $query->where('id', 'like', "$search%")
                        ->whereHas('certificationBundle', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });

                    })->orWhereHasMorph('item', [
                        'App\CourseBooking',
                        'App\TourBooking',
                        'App\SoftwareQuotation',
                        'App\HotelReservation',
                        'App\CertificationBooking',
                        'App\CertificationBundleBooking',
                ], function ($query) use ($search) {
                    $query->whereHas('customer', function ($query) use ($search) {
                        $query->where('first_name', 'like', "%$search%")->orWhere(
                            'last_name', 'like', "%$search%"
                        );
                    });
                });
            });

        })->latest()->paginate(30)->appends( $request->query() );

        return view('backoffice.payment.index', compact('payments'));
    }

    /**
     * Show the specified resource.
     *
     * @param Payment $payment
     * @return Response
     */
    public function show(Payment $payment)
    {
        $currency = Currency::where('code', $payment->item->currency_code)->first();

        return ( PDF::loadView('backoffice/payment/export/invoice', compact('payment', 'currency')) )->stream();
    }

    /**
     * Show the specified resource.
     *
     * @param Payment $payment
     * @return Response
     */
    public function invite(Payment $payment)
    {
        $booking = CourseBooking::whereId($payment->item_id)->first();

        return ( PDF::loadView('backoffice/customer/export/invite', [
            'course' => $booking->course,
            'schedule' => $booking->schedule,
            'booking' => $booking,
            'payment' => $payment
        ]))
            ->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Payment $payment
     * @return View
     */
    public function edit(Payment $payment)
    {
        return view('backoffice.payment.edit', compact('payment'));
    }

    /**
     * Show the form for creating the specified resource.
     *
     * @return View
     */
    public function create()
    {
        return view('backoffice.payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->group == 'Yes' & count($request->customer) > 1){
            $group_reg = "Yes";
        }else{
            $group_reg = "No";
        }
        # return $request;
        $request->validate([
            'customer' => 'required',
            'course' => 'required',
            'company' => 'required',
            'payment_method' => 'required',
            'currency' => 'required',
            'amount' => 'nullable',
            'authority_name' => 'nullable',
            'authority_phone' => 'nullable',
            'authority_email' => 'nullable',
            'authority_designation' => 'nullable',
            'from' => 'nullable',
            'to' => 'nullable',
            'city_id' => 'nullable',
            'primary_contact' => 'required'
        ]);

        $course = Course::where('id', $request->course)->first();

        if ($course === null) {
            return back()->with('error', 'Please select right course from the selection');
        }

        # customer profile
        $customer = Customer::where('id', $request->primary_contact)->first();

        if ($customer === null) {
            return back()->with('error', 'Please select right customer from the selection');
        }

        if (!$customer->first_name || !$customer->last_name || !$customer->work_email) {
            return back()->with('error', 'Please Update customer Emails and Name');
        }

        if ( $request->filled(['from', 'to', 'city_id']) ){
            $physical_class = $course->physicalClasses()->create( $request->all() );
        }else{
            $physical_class = PhysicalClass::where('id', $request->schedule)->first();
        }

        $currencies = $request->only( array_filter( $request->keys(), function ($key) use ($request) {
            return strpos($key, 'currency-amount') and $request->filled($key);
        }) );

        $physical_class->currencies()->attach( array_combine( array_map(function ($key) use ($request) {
            return City::find($request->city_id)->venue->currencies()->whereCode( substr($key, 0, -16) )->first()->id;
        }, array_keys($currencies)), array_map( function ($value) {
            return ['amount' => $value];
        }, $currencies) ) );

        $schedule_type = get_class($physical_class);
        $schedule_id = $physical_class->id;

        # company
        $company = Company::firstOrCreate(['name' => $request->company], [
            'name' => $request->company,
        ]);

        # approving authority

        if ( $request->filled(['authority_name', 'authority_phone', 'authority_email', 'authority_designation']) )
            $approved_authority = ApprovedAuthority::firstOrCreate([
                'email' => $request->authority_email
            ], [
                'name' => $request->authority_name,
                'phone' => $request->authority_phone,
                'email' => $request->authority_email,
                'designation' => $request->authority_designation,
                'company_id' => $company->id,
                'country_code' => $request->authority_code,
            ]);

        # tax percentage
        $currency = $physical_class->currencies()->where('code', $request->currency)->first();

        if (@$currency->tax and $physical_class->tax)
            $tax_percentage = $physical_class->tax;
        else $tax_percentage = 0;

        #check if the amount field filled
        if($request->filled(['amount']))
            $amount = $request->amount * count($request->customer);
        else $amount = $currency->pivot->amount * count($request->customer);

        # booking
        $group_booking = $customer->bookings()->create( array_merge([
            'approved_authority_id' => @$approved_authority->id,
            'course_id' => $course->id,
            'company_id' => $company->id,
            'name' => ucwords("$customer->first_name $customer->last_name"),
            'phone' => $customer->phone,
            'personal_email' => $customer->account->email,
            'work_email' => $customer->work_email,
            'currency_code' => $request->currency,
            'learn_about_us' => '',
            'schedule_cost' => $amount,
            'salutation' => $customer->salutation,
            'designation' => $customer->designation,
            'country' => $customer->country,
            'payment_method' => $request->payment_method,
            'customer_id' => $customer->id,
            'group' => $group_reg,
        ], compact('schedule_type', 'tax_percentage', 'schedule_id')) );

        #  create payment
        $payment = Payment::create([
            'amount' => $group_booking->total_cost,
            'item_id' => $group_booking->id,
            'item_type' => get_class($group_booking),
            'method' => $request->payment_method,
            'currency' => $group_booking->currency_code,
            'status' => 'pending',
            'group_registration' => $group_reg,
            'participant' => $customer->id
        ]);

        if($request->group == 'Yes' & count($request->customer) > 1){
            $customers = 0;
            do {
                # customer profile
                $individual = Customer::where('id', $request->customer[$customers])->first();

                GroupRegistrationParticipants::create(['booking_id' => $group_booking->id,
                    'customer_id' => $individual->id]);

                #  create payment
                Payment::create([
                    'amount' => $group_booking->total_cost / count($request->customer),
                    'item_id' => $group_booking->id,
                    'item_type' => get_class($group_booking),
                    'method' => $request->payment_method,
                    'currency' => $group_booking->currency_code,
                    'participant' => $individual->id,
                    'status' => 'pending',
                ]);
                $customers++;
            } while ($customers < count($request->customer));

            # notify customer on email
            InvoiceCreationProcess::dispatch($payment, $group_booking);
        }

        return redirect(route('backoffice.invoice.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Payment $payment
     * @return RedirectResponse
     */
    public function update(Request $request, Payment $payment)
    {
        if ( DB::table('payments')->where('id', $payment->id)->update(

            $request->only(['date_received', 'date_approved'])
        ))
            # alert user of update
            Session::flash('success', 'Invoice has been updated');

        return back();
    }
}

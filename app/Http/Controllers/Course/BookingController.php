<?php

namespace App\Http\Controllers\Course;

use App\CourseBooking;
use App\Course;
use App\ApprovedAuthority;
use App\User;
use App\Customer;
use App\Company;
use App\Payment;
use App\PhysicalClass;
use App\VirtualClass;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Course\Booking\StoreRequest;
use App\Mail\Customer\RegistrationMail;
use App\Mail\Course\RegistrationMail as CustomerBookingMail;
use App\Mail\Admin\Course\RegistrationMail as AdminCourseBookingMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use SEO;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function create(Course $course)
    {

        SEO::setTitle( "Booking - $course->name - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "Booking - $course->name - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Booking - $course->name - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Booking - $course->name - " . config('app.name') );

        $customer = Auth::check()
                        ? Customer::whereUserId( Auth::id() )->first()
                        : null;

        $user_country = geo()->country_name ?? @$customer->country;

        return view('front/course/booking/create', compact('customer', 'course', 'user_country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Course $course
     * @return Application|RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function store(StoreRequest $request, Course $course)
    {
        # user account
        if ( Auth::check() )
            $user = Auth::user();
        else {
            $user = User::firstOrCreate(['email' => $request->email], [

                'email' => $request->email,
                'password' => Hash::make($password = Str::random(8)),
                'role' => 'customer',
                'email_verified_at' => now(),
            ]);

            Auth::login($user, true);
        }

        $this->authorize('customer');

        # company
        $company = Company::firstOrCreate(['name' => $request->company], [
            'name' => $request->company,
        ]);

        # customer profile
        if ( $user->wasRecentlyCreated ) {
            $customer = Customer::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'designation' => $request->designation,
                'company_id' => $company->id,
                'country' => $request->country,
                'phone' => '+' . $request->country_code . $request->phone,
                'work_email' => $request->work_email,
            ]);

            Mail::to($user)->send(
                new RegistrationMail($customer, $password)
            );
        }
        else
            $customer = Customer::whereUserId($user->id)->first();

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

        # booking schedule
        switch ($request->schedule_type) {
            case 'physical':
                $schedule = PhysicalClass::find($request->schedule_id);
                $schedule_type = get_class($schedule);
                $schedule_id = $schedule->id;
                break;

            case 'virtual':
                $schedule = VirtualClass::find($request->schedule_id);
                $schedule_type = get_class($schedule);
                $schedule_id = $schedule->id;
                break;

            default:
                # code...
                break;
        }

        # tax percentage
        $currency = $schedule->currencies()->where('code', $request->currency)->first();

        if (@$currency->tax and $schedule->tax)
            $tax_percentage = $schedule->tax;
        else $tax_percentage = 0;

        # booking
        $booking = $customer->bookings()->create( array_merge([
            'approved_authority_id' => @$approved_authority->id,
            'course_id' => $course->id,
            'company_id' => $company->id,
            'name' => ucwords("$request->first_name $request->last_name"),
            'phone' => '+' . $request->country_code . $request->phone,
            'personal_email' => $request->email,
            'work_email' => $request->work_email,
            'currency_code' => $request->currency,
            'learn_about_us' => $request->learn_about_us,
            'schedule_cost' => $request->schedule_cost,
            'salutation' => $request->salutation,
            'designation' => $request->designation,
            'country' => $request->country,
            'payment_method' => $request->payment_method,
            'customer_id' => $request->customer_id,
            'no_company'=> $request->no_company,
            'no_department' => $request->no_department,
            'department' => $request->department,
            
        ], compact('schedule_type', 'tax_percentage', 'schedule_id')) );

        # participants
        if ( $participants = json_decode($request->participants) )
            $booking->participants()->createMany( array_map(function ($participant) {
                return get_object_vars($participant);
            }, $participants) );

        # tours
        if ( $tours = json_decode($request->tours) )
            $booking->tours()->attach( array_combine( array_map(function ($tour) {
                return $tour->id;
            }, $tours), array_map(function ($tour) {
                return [
                    'cost' => $tour->cost,
                    'participants' => $tour->participants,
                ];
            }, $tours)) );

        # software
        if ( $software = json_decode($request->software) )
            $booking->software()->attach( array_combine( array_map(function ($software) {
                return $software->id;
            }, $software), array_map(function ($software) {
                return [
                    'cost' => 0,
                    'licenses' => $software->licenses,
                ];
            }, $software)) );

        # create payment
        Payment::create([
            'amount' => $booking->total_cost,
            'item_id' => $booking->id,
            'item_type' => get_class($booking),
            'method' => $request->payment_method,
            'currency' => $booking->currency_code,
            'status' => 'pending',
        ]);

        # notify customer on email
        Mail::to($booking->work_email ?? $user->email)->cc($booking->personal_email)->send(
            new CustomerBookingMail($booking)
        );

        # notify admin on email
        Mail::to($schedule->city->venue->email)->send(
            new AdminCourseBookingMail($booking)
        );

        # generate page redirect link
        switch ($request->payment_method) {
            case 'paypal':
                $redirect_url = route('course.payment.paypal.create', $booking->payment);
                break;

            default:
                $redirect_url = route('course.booking.feedback', $booking);
                break;
        }

        return redirect($redirect_url);
    }

    /**
     * Show thank you feedback.
     *
     * @param CourseBooking $booking
     * @return Application|Factory|View
     */
    public function feedback(CourseBooking $booking)
    {
        return view('front/course/booking/feedback', compact('booking'));
    }
}

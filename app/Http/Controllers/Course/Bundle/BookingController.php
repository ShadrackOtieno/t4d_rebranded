<?php

namespace App\Http\Controllers\Course\Bundle;

use App\CourseBundleBooking;
use App\CourseBundle;
use App\ApprovedAuthority;
use App\User;
use App\Customer;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Course\Bundle\Booking\StoreRequest;
use App\Http\Controllers\Traits\PaymentTrait;
use App\Mail\Customer\RegistrationMail;
use Hash;
use Str;
use Mail;
use Auth;

class BookingController extends Controller
{
    use PaymentTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function create(CourseBundle $bundle)
    {
        $customer = Auth::check() ? Customer::whereUserId( Auth::id() )->first() : null;

        $user_country = geo()->country_name ?? @$customer->country;

        return view('front/course/bundle/booking/create', compact('customer', 'bundle', 'user_country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Course\Bundle\Booking\StoreRequest  $request
     * @param  \App\CourseBundle  $bundle
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CourseBundle $bundle)
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
            ]);

        # booking

        $booking = $customer->bundleBookings()->create( array_merge( $request->all(), [

            'approved_authority_id' => @$approved_authority->id,
            'course_bundle_id' => $bundle->id,
            'company_id' => $company->id,
            'amount' => $request->schedule_cost,
            'name' => ucwords("$request->first_name $request->last_name"),
            'phone' => '+' . $request->country_code . $request->phone,
            'personal_email' => $request->email,
        ]) );

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

        $this->createPayment($booking, $request->payment_method);

        # notify admin on course booking observer class

        switch ($request->payment_method) {

            case 'paypal':
                $redirect_url = route('course.certification.payment.paypal.create', $booking->payment);
                break;
            
            default:
                $redirect_url = route('course.certification.booking.feedback', $booking);
                break;
        }  

        return redirect($redirect_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBundleBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function feedback(CourseBundleBooking $booking)
    {
        return view('front/course/bundle/booking/feedback', compact('booking'));
    }
}

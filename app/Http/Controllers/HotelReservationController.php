<?php

namespace App\Http\Controllers;

use App\HotelReservation;
use App\User;
use App\Customer;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\HotelBooking\StoreRequest;
use App\Mail\Customer\RegistrationMail;
use App\Http\Controllers\Traits\PaymentTrait;
use Hash;
use Str;
use Mail;
use Auth;
use Storage;
use SEO;

class HotelReservationController extends Controller
{
    use PaymentTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        SEO::setTitle( 'Hotel Reservation ');
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( 'Hotel Reservation - ' . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( 'Hotel Reservation - ' . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( 'Hotel Reservation - ' . config('app.name') );
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');
        
        $customer = Auth::check() 
                        ? Customer::whereUserId( Auth::id() )->first() 
                        : null;

        return view('front/hotel_reservation/create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HotelBooking\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
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

        # reservation

        $reservation = HotelReservation::create( array_merge(

            $request->all(), [

                'customer_id' => $customer->id,
                'name' => ucwords("$request->first_name $request->last_name"),
                'phone' => '+' . $request->country_code . $request->phone,
            ]
        ));

        # create payment

        $this->createPayment($reservation, 'offline');

        # notify admin on hotel reservtion observer

        return back()->with('success', 'Your reservation has been made');
    }
}

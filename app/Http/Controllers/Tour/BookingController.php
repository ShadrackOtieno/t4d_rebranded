<?php

namespace App\Http\Controllers\Tour;

use App\Tour;
use App\Payment;
use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tour\Booking\StoreRequest;
use App\Mail\Customer\RegistrationMail;
use App\Mail\Tour\BookingMail as CustomerBookingMail;
use App\Mail\Admin\Tour\BookingMail as AdminBookingMail;
use Hash;
use Str;
use Mail;
use Auth;
use SEO;

class BookingController extends Controller
{
	/**
     * Show the form for creating a new resource.
     *
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function create(Tour $tour)
    {
        SEO::setTitle( "Booking - $tour->name - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "Booking - $tour->name - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Booking - $tour->name - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Booking - $tour->name - " . config('app.name') );

        $customer = Auth::check() 
                        ? Customer::whereUserId( Auth::id() )->first() 
                        : null;

        $user_country = old('country', geo()->country_name ?? @$customer->country);

        return view('front/tour/booking/create', compact('customer', 'tour', 'user_country'));
    }

    /**
     * Customer booking.
     *
     * @param  \App\Http\Requests\Tour\Booking\StoreRequest  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Tour $tour)
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

        # customer profile

        if ( $user->wasRecentlyCreated ) {

            $customer = Customer::create([

                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'designation' => $request->designation,
                'company_id' => $request->company_id,
                'country' => $request->country,
                'phone' => $request->phone,
                'work_email' => $request->work_email,
            ]);

            Mail::to($user)->send( 

                new RegistrationMail($customer, $password) 
            );
        }      
        else
            $customer = Customer::whereUserId($user->id)->first();

        # date schedule
        
        if ($tour->readily_available) {

            $from = $request->from;
            $to = $request->to;
        }
        else {

            $schedule = $tour->schedules()->find($request->preferred_date);

            $from = $schedule->from;
            $to = $schedule->to;
        }

        # currency
        
        $currency = @$tour->currencies()->where('code', 'USD')->first();

        # booking

        $booking = $tour->bookings()->create( array_merge($request->only([

            'last_name', 'first_name', 'phone', 'participants', 'message', 'email', 'country', 'meals', 'transport', 'airport_pickup', 'accommodation',

        ]), [

            'customer_id' => $customer->id,
            'currency_code' => 'USD',
            'tax_percentage' => @$currency->venue->tax ?? 0,
            'cost' => @$currency->pivot->amount ?? 0,

        ], compact('from', 'to')) );

        # payment

        Payment::create([

        	'amount' => $booking->total_cost,
        	'item_id' => $booking->id,
        	'item_type' => get_class($booking),
        	'method' => 'offline',
        	'currency' => $booking->currency_code,
        	'status' => 'pending',
        ]);

        # notify customer on mail
        
        Mail::to( $booking->email ?? $user->email )->send(

            new CustomerBookingMail($booking)
        );

        # notify admin on mail
        
        Mail::to( config('headoffice.email') )->send(

            new AdminBookingMail($booking)
        );

        return back()->with('success', 'Your booking details has been received. We will get in touch with you');
    }
}

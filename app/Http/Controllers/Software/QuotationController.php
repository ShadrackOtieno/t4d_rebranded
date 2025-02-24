<?php

namespace App\Http\Controllers\Software;

use App\Software;
use App\Customer;
use App\Payment;
use App\User;
use App\SoftwareQuotation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Software\Quotation\StoreRequest;
use App\Mail\Customer\RegistrationMail;
use App\Http\Controllers\Traits\PaymentTrait;
use App\Mail\Admin\Software\QuotationMail as AdminQuotationMail;
use App\Mail\Software\QuotationMail as CustomerQuotationMail;
use Hash;
use Str;
use Mail;
use Auth;
use SEO;

class QuotationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function create(Software $software)
    {
        SEO::setTitle( "Request Quotate - $software->name - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "Request Quotate - $software->name - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Request Quotate - $software->name - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Request Quotate - $software->name - " . config('app.name') );

        $customer = Auth::check() 
                        ? Customer::whereUserId( Auth::id() )->first() 
                        : null;

        $user_country = geo()->country_name ?? @$customer->country;

        return view('front/software/quotation/create', compact('customer', 'software', 'user_country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Software\Quotation\StoreRequest  $request
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Software $software)
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
                'first_name' => explode(' ', $request->name)[0],
                'last_name' => explode(' ', $request->name)[1],
                'designation' => $request->designation,
                'company_id' => $request->company_id,
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

        # quotation

        $quotation = SoftwareQuotation::create( array_merge( $request->except([

        	'phone',
        	
        ]), [

            'customer_id' => $customer->id,
            'software_id' => $software->id,
            'phone' => '+' . $request->country_code . $request->phone,
            'price' => 0,
        ]) );

        # create payment

        $quotation->payment()->create([

        	'amount' => 0,
        	'method' => 'offline',
        	'currency' => 'USD',
        	'status' => 'pending',
        ]);

        # notify customer on email
        
        Mail::to( $quotation->email ?? $user->email )->send(

            new CustomerQuotationMail($quotation)
        );

        # notify admin on email
        
        Mail::to( config('headoffice.email') )->send(

            new AdminQuotationMail($quotation)
        );

        return back()->with('success', 'Your quotation request has been sent');
    }
}

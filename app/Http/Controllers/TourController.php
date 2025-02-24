<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tour;
use App\Document;
use App\Download;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use App\Mail\Customer\RegistrationMail;
use App\Http\Controllers\Traits\PaymentTrait;
use Hash;
use Str;
use Mail;
use Auth;
use Storage;
use SEO;

class TourController extends Controller
{
    use PaymentTrait;

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        SEO::setTitle( "Tours ");
        SEO::setDescription('Whether you need an excursion for yourself or your team, a field trip, case study tour and so much more, we’ve got you covered. Explore our collection of tours and pick your next destination');

        SEO::opengraph()->setTitle( "Tours - " . config('app.name') );
        SEO::opengraph()->setDescription( 'Whether you need an excursion for yourself or your team, a field trip, case study tour and so much more, we’ve got you covered. Explore our collection of tours and pick your next destination');
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Tours - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Tours - " . config('app.name') );
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        $tours = Tour::when($request->category, function($query, $category) {

            $query->where('category_id', $category);

        })->when($request->subcategory, function ($query, $subcategory) {

            $query->where('subcategory_id', $subcategory);

        })->with('currencies')->latest()->paginate(10);

        return view('front/tour/index', compact('tours'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        SEO::setTitle( "$tour->name - Tours - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "$tour->name - Tours - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$tour->name - Tours - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$tour->name - Tours - " . config('app.name') );

        $customer = Auth::check() 
                        ? Customer::whereUserId( Auth::id() )->first() 
                        : null;

        return view('front/tour/show', compact('tour', 'customer'));
    }

    /**
     * Download itinerary.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function document(Request $request)
    {
        $document = Document::find($request->document_id);

        Download::create( array_merge($request->all(), ['document' => $document->name]) );

        return Storage::download($document->path, $document->name);
    }

    /**
     * Download document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function itinerary(Request $request, Tour $tour)
    {
        Download::create( array_merge($request->all(), ['document' => "Itinerary for $tour->name"]) );

        return Storage::download($tour->itinerary, "Itinerary for $tour->name.pdf");
    }

    /**
     * Customer enquiry.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function enquiry(Request $request, Tour $tour)
    {
        $tour->enquiries()->create( $request->all() );

        return back()->with('success', 'Your enquiry has been sent');
    }

    /**
     * Customer referral.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function referral(Request $request, Tour $tour)
    {
        $tour->referrals()->create( $request->all() );

        return back()->with('success', 'Your message has been sent to your colleague');
    }

    /**
     * Customer booking.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function booking(Request $request, Tour $tour)
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
                'phone' => $request->phone,
                'work_email' => $request->work_email,
            ]);

            Mail::to($user)->send( 

                new RegistrationMail($customer, $password) 
            );
        }      
        else
            $customer = Customer::whereUserId($user->id)->first();

        # booking

        $booking = $tour->bookings()->create( array_merge($request->all(), ['customer_id' => $customer->id]) );

        # payment

        $this->createPayment($booking, 'offline');

        # notify admin on mail (tour booking observer)

        return back()->with('success', 'Your booking details has been received. We will get in touch with you');
    }
}

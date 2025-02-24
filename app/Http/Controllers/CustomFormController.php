<?php

namespace App\Http\Controllers;

use App\Company;
use App\Currency;
use App\Customer;
use App\CustomForm;
use App\Mail\Customer\RegistrationMail;
use App\Mail\CustomEventBookingMail;
use App\User;
use App\Venue;
use PDF;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use SEO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CustomFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $bookings = CustomForm::paginate(100);

        return view('backoffice.events.custom-events', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
    	SEO::setTitle( 'GDPR, Data Privacy, Protection, Cyber-Security & IT Security Masterclass Certification' . config('app.name') );
    	SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( 'GDPR, Data Privacy, Protection, Cyber-Security & IT Security Masterclass Certification - ' . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( 'GDPR, Data Privacy, Protection, Cyber-Security & IT Security Masterclass Certification - ' . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( 'GDPR, Data Privacy, Protection, Cyber-Security & IT Security Masterclass Certification - ' . config('app.name') );

        return view('front.custom-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'salutation' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'designation' => 'required|min:3',
            'company' => 'required|min:3',
            'country' => 'required',
            'country_code' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'tocs' => 'required',
            'event' => 'required',
            'venue' => 'required',
            'dates' => 'required',
            'currency_fee' => 'required',
        ]);

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
                'salutation' => $request->salutation,
                'company_id' => $company->id,
                'country' => $request->country,
                'phone' => '+' . $request->country_code . $request->phone,
                'work_email' => $request->email,
            ]);

            Mail::to($user)->send(
                new RegistrationMail($customer, $password)
            );
        }
        else
            $customer = Customer::whereUserId($user->id)->first();

        $booking = CustomForm::create([
            'customer_id' => $customer->id,
            'company_id' => $company->id,
            'event' => $request->event,
            'dates' => $request->dates,
            'venue' => $request->venue,
            'kes_fee' => $request->kes_fee,
            'usd_fee' => $request->usd_fee,
            'currency_fee' => $request->currency_fee,
        ]);

        # notify customer on email
        Mail::to($customer->work_email ?? $user->email)->cc($user->email)->send(
            new CustomEventBookingMail($booking)
        );

        return redirect()->back()->with('success', 'Event Registration submitted successfully!');
    }

    /**
     * Display invoice.
     * @param CustomForm $booking
     * @return Application|Factory|View
     */
    public function invoice(CustomForm $booking)
    {
        $country = Venue::where('country', 'Kenya')->first();
        if($booking->currency_fee == 'USD') {
            $fee = 'usd_fee';
            $bank = Currency::where([['code', $booking->currency_fee],
                ['venue_id', $country->id]])->first();
        }else{
            $fee = 'kes_fee';
            $bank = Currency::where('code', $booking->currency_fee)->first();
        }
        return ( PDF::loadView('backoffice.events.invoice', compact('booking', 'fee', 'bank')))->stream();
    }
}

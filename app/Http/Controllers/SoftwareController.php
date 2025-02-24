<?php

namespace App\Http\Controllers;

use App\Software;
use App\SoftwareQuotation;
use App\User;
use App\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\Customer\RegistrationMail;
use App\Http\Controllers\Traits\PaymentTrait;
use Hash;
use Illuminate\View\View;
use Str;
use Mail;
use Auth;
use SEO;

class SoftwareController extends Controller
{
    use PaymentTrait;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        SEO::setTitle( "Enterprise Systems ");
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "Enterprise Systems - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "Enterprise Systems - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "Enterprise Systems - " . config('app.name') );
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        $software = Software::when($request->subcategory, function ($query, $subcategory) use ($request) {
            $query->where('subcategory_id', $subcategory);
        }, function ($query) use ($request) {
            $query->where('category_id', 'like', "$request->category%");
        })->latest()->paginate(10);

        return view('front/software/index', compact('software'));
    }

    /**
     * Display the specified resource.
     *
     * @param Software $software
     * @return Application|Factory|View
     */
    public function show(Software $software)
    {
        SEO::setTitle( "$software->name - Enterprise Systems - " . config('app.name') );
        SEO::setDescription( config('app.description') );

        SEO::opengraph()->setTitle( "$software->name - Enterprise Systems - " . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( "$software->name - Enterprise Systems - " . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( "$software->name - Enterprise Systems - " . config('app.name') );

        $software->load('category', 'subcategory');

        $customer = Auth::check()
                        ? Customer::whereUserId( Auth::id() )->first()
                        : null;

        return view('front/software/show', compact('software', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function quote(Request $request)
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

        # quotation
        $quote = SoftwareQuotation::create( array_merge($request->all(), [
            'customer_id' => $customer->id,
            'price' => 0,
        ]) );

        # create payment
        $this->createPayment($quote, 'offline');

        # notify admin (software quotation observer)
        return back()->with('success', 'Your quotation request has been sent');
    }
}

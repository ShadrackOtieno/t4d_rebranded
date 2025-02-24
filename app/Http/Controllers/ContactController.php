<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use SEO;

class ContactController extends Controller
{
    /**
     * Display resource.
     *
     * @return Application|Factory|View
     */
    public function form()
    {
        SEO::setDescription( config('app.description') );
        SEO::setTitle('Contact Us' );

        SEO::opengraph()->setTitle( 'Contact Us - ' . config('app.name') );
        SEO::opengraph()->setDescription( config('app.description') );
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( 'Contact Us - ' . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');

        SEO::jsonLd()->setTitle( 'Contact Us - ' . config('app.name') );
        SEO::jsonLd()->setDescription('At indepth research institute We love hearing from all of you.');
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        return view('front/contact');
    }

    /**
     * Show the profile for the given user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'phone' => 'nullable|min:8',
            'no_of_employees' => 'nullable|min:1',
            'message' => 'required|min:10',
            'company' => 'nullable|min:3',
            'country' => 'nullable|min:2',
            'type' => 'nullable',
            'designation' => 'nullable',
            'learn_about_us' => 'nullable'
        ]);

        Contact::create( $validated );

    	// Mail::to( config('mail.admin.address') )->send( new ContactMail($request->all()) );

        return back()->with('success', 'Thank you for your enquiry. We will get in touch with you.');
    }


    /**
     * Display resource.
     *
     * @return View
     */
    public function affiliate(): View
    {
        return view('front/become-an-affiliate');
    }
 
    /**
     * Display resource.
     *
     * @return View
     */
    public function agent(): View
    {
        return view('front/become-an-agent');
    }

    public function partner(): View
    {
        return view('front/partner-with-us');
    }
}

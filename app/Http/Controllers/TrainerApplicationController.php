<?php

namespace App\Http\Controllers;

use App\TrainerApplication;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\TrainerApplication\ApplicationMail;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Mail;
use SEO;

class TrainerApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        SEO::setTitle( 'Become a Trainer ');
        SEO::setDescription('Join IRES as a trainer and be part of our rapid growth. With operations in 7 training stations globally across 15 sectors, we foster innovation and collaboration. Apply now to devise and implement innovative training strategies and excel in a dynamic team');

        SEO::opengraph()->setTitle( 'Become a Trainer - ' . config('app.name') );
        SEO::opengraph()->setDescription('Join IRES as a trainer and be part of our rapid growth. With operations in 7 training stations globally across 15 sectors, we foster innovation and collaboration. Apply now to devise and implement innovative training strategies and excel in a dynamic team');
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( 'Become a Trainer - ' . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');
        SEO::twitter()->setDescription('Join IRES as a trainer and be part of our rapid growth. With operations in 7 training stations globally across 15 sectors, we foster innovation and collaboration. Apply now to devise and implement innovative training strategies and excel in a dynamic team');
        SEO::twitter()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        SEO::jsonLd()->setTitle( 'Become a Trainer - ' . config('app.name') );
        SEO::jsonLd()->setDescription('Join IRES as a trainer and be part of our rapid growth. With operations in 7 training stations globally across 15 sectors, we foster innovation and collaboration. Apply now to devise and implement innovative training strategies and excel in a dynamic team');
        SEO::jsonLd()->setUrl(url()->current());
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        return view('front/trainer_application/trainers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        SEO::setTitle( 'Register as a Trainer - ' . config('app.name') );
        SEO::setDescription('Interested in joining the IRES team as a trainer? Fill out the form to apply, and we\'ll get back to you promptly. Start your rewarding career with us today!');

        SEO::opengraph()->setTitle( 'Become a Trainer - ' . config('app.name') );
        SEO::opengraph()->setDescription('Interested in joining the IRES team as a trainer? Fill out the form to apply, and we\'ll get back to you promptly. Start your rewarding career with us today');
        SEO::opengraph()->setUrl( url()->current() );

        SEO::twitter()->setTitle( 'Become a Trainer - ' . config('app.name') );
        SEO::twitter()->setSite('@indepthresearch');
        SEO::twitter()->setDescription('Interested in joining the IRES team as a trainer? Fill out the form to apply, and we\'ll get back to you promptly. Start your rewarding career with us today');

        SEO::jsonLd()->setTitle( 'Become a Trainer - ' . config('app.name') );
        SEO::jsonLd()->setUrl( url()->current() );
        SEO::jsonLd()->setDescription('Interested in joining the IRES team as a trainer? Fill out the form to apply, and we\'ll get back to you promptly. Start your rewarding career with us today');
        return view('front/trainer_application/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $document = $request->hasFile('document')
                        ? $request->file('document')->store('trainer/application')
                        : null;

        $trainer_application = TrainerApplication::create( array_merge(

            $request->except('document'), compact('document'))
        );

        Mail::to( config('mail.admin.address') )
            ->send( new ApplicationMail($trainer_application) );

        return back()->with('success', 'Your application has been submitted');
    }
}

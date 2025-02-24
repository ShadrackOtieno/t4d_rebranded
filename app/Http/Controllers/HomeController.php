<?php

namespace App\Http\Controllers;

use App\Company;
use App\LandingPage\LandingPage;
use Illuminate\View\View;
use SEO;
use App\Category;

class HomeController extends Controller
{
    /**
     * Display resource.
     *
     * @return View
     */
    public function __invoke()
    {
        SEO::setTitle("Home ");
        SEO::setDescription('IRES is a global corporate training and professional services firm that partners with organizations to enhance productivity, performance, sustainability, and overall success.');

        SEO::opengraph()->setTitle('Home');
        SEO::opengraph()->setDescription('IRES is a global corporate training and professional services firm that partners with organizations to enhance productivity, performance, sustainability, and overall success. ');
        SEO::opengraph()->setUrl(url()->current());
        SEO::opengraph()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        SEO::twitter()->setTitle('Home');
        SEO::twitter()->setDescription('IRES is a global corporate training and professional services firm that partners with organizations to enhance productivity, performance, sustainability, and overall success.'); // Adding description for consistency
        SEO::twitter()->setSite('@indepthresearch');
        SEO::twitter()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');

        SEO::jsonLd()->setTitle('Home');
        SEO::jsonLd()->setDescription('IRES is a global corporate training and professional services firm that partners with organizations to enhance productivity, performance, sustainability, and overall success.');
        SEO::jsonLd()->setUrl(url()->current());
        SEO::jsonLd()->addImage('https://www.indepthresearch.org/front/assets/img/logo/IRES-logo.png');


        $categories = Category::course()->with('subcategories')->latest()->paginate(10);

        $clients = Company::where('status', 'Approved')->get();

        return view('front/index', compact('categories', 'clients'));
        // return view('front/index');
    }

    public function pages(LandingPage $landing)
    {
        $pages = LandingPage::all();
        return view('front.landing-page.index', compact('pages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LandingPage $landing_page
     * @return View
     */
    public function landingPage($slug)
    {
        $page = LandingPage::where('slug', $slug)->first();

        return view('front.landing-page.page', compact('page'));
    }
}

<?php

namespace App\Http\Controllers;

use App\CareerModule;
use Illuminate\Http\Request;
use Illuminate\View\View;
use SEO;

class OpportunityController extends Controller
{
    public function careers(): View
    {
        SEO::setTitle( 'Careers at ');
        SEO::setDescription( 'IRES is an organization committed to fostering an environment that values and prioritizes the members of our team.' );

        $careers = CareerModule::all()
                    ->where('Apply_before', '>', now());

        return view('front/careers', compact('careers'));
    }

    //To return a view of a single career desrciption
    public function career($id): view {
        $career = CareerModule::findOrFail($id);

        return view('front/career', compact('career'));
    }

}
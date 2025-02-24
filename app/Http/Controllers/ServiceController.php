<?php

namespace App\Http\Controllers;

use App\ServiceIndustry;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function sectors(): View
    {
        return view('front/sector');
    }

    public function capabilities(): View
    {
        return view('front/capability');
    }

    public function corporates(): View
    {
        return view('front/corporate');
    }

    /**
     * Return page for the specified resource.
     *
     * @return Application|Factory|View
     */
    public function industry($slug)
    {
        $serviceIndustry = ServiceIndustry::where('slug', $slug)->first();

        return view('front/sectors/index', compact('serviceIndustry'));
    }
}

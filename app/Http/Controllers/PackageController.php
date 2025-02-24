<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    // Display all packages
    public function index()
    {
        // Load all your cards (individual and corporate) and pass them to the view
        return view('front.packages.index');
    }

    // Show specific packages
    public function show($type)
    {
        // Here, $type can be either 'individual' or 'corporate'
        if ($type === 'individual') {
            return view('front.packages.individual'); // Loads individual package cards
        } elseif ($type === 'corporate') {
            return view('front.packages.corporate');  // Loads corporate package cards
        } else {
            abort(404); // If no matching type, show 404 error
        }
    }
}

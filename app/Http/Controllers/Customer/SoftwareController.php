<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\SoftwareQuotation;
use App\Customer;
use Illuminate\Http\Request;
use Auth;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software_quotes = Customer::whereUserId( Auth::id() )->first()->softwareQuotes()->latest()->paginate(10);

        return view('front/customer/account/software/index', compact('software_quotes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoftwareQuotation  $software_quote
     * @return \Illuminate\Http\Response
     */
    public function show(SoftwareQuotation $software_quote)
    {
        return view('front/customer/account/software/show', compact('software_quote'));
    }
}

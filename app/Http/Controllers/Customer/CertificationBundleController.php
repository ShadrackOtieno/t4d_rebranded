<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CertificationBundleBooking;
use App\Customer;
use Auth;

class CertificationBundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Customer::whereUserId( Auth::id() )->first()->certificationBundleBookings()->latest()->paginate(10);

        return view('front/customer/account/certification_bundle/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CertificationBundleBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(CertificationBundleBooking $booking)
    {
        return view('front/customer/account/certification_bundle/show', compact('booking'));
    }
}

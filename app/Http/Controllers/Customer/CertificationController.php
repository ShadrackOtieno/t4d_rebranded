<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CertificationBooking;
use App\Customer;
use Auth;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Customer::whereUserId( Auth::id() )->first()->certificationBookings()->latest()->paginate(10);

        return view('front/customer/account/certification/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CertificationBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(CertificationBooking $booking)
    {
        return view('front/customer/account/certification/show', compact('booking'));
    }
}

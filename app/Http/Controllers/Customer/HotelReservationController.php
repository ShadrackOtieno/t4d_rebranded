<?php

namespace App\Http\Controllers\Customer;

use App\HotelReservation;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class HotelReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Customer::whereUserId( Auth::id() )->first()->reservations()->latest()->paginate(10);

        return view('front/customer/account/reservation/index', compact('reservations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelReservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(HotelReservation $reservation)
    {
        return view('front/customer/account/reservation/show', compact('reservation'));
    }
}

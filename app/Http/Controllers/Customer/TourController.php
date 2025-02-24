<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\TourBooking;
use App\Customer;
use App\TourReview;
use Illuminate\Http\Request;
use Auth;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Customer::whereUserId( Auth::id() )->first()->tourBookings()->with('tour.currencies')->latest()->paginate(10);

        return view('front/customer/account/tour/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(TourBooking $booking)
    {
        $booking->load('tour.currencies');

        return view('front/customer/account/tour/show', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \use Illuminate\Http\Request  $request
     * @param  \App\TourBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request, TourBooking $booking)
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        TourReview::updateOrCreate([

            'booking_id' => $booking->id,
            'customer_id' => $customer->id,

        ], array_merge($request->only(['rating', 'comment']), [

            'booking_id' => $booking->id,
            'customer_id' => $customer->id,
        ]) );

        return back()->with('success', 'Your review has been saved');
    }
}

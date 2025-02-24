<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\CourseBundleBooking;
use App\TrainerIssue;
use App\CourseBundleReview;
use Auth;

class BundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Customer::whereUserId( Auth::id() )->first()->bundleBookings()->latest()->paginate(10);

        return view('front/customer/account/bundle/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBundleBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(CourseBundleBooking $booking)
    {
        $booking->load('schedule', 'courseBundle');

        return view('front/customer/account/bundle/show', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBundleBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function feedback(CourseBundleBooking $booking)
    {
        $booking->load('courseBundle');

        return view('front/customer/account/bundle/feedback', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \use Illuminate\Http\Request  $request
     * @param  \App\CourseBundleBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request, CourseBundleBooking $booking)
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        CourseBundleReview::updateOrCreate([

            'booking_id' => $booking->id,
            'customer_id' => $customer->id,

        ], array_merge($request->only(['rating', 'comment']), [

            'booking_id' => $booking->id,
            'customer_id' => $customer->id,
        ]) );

        return back()->with('success', 'Your review has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \use Illuminate\Http\Request  $request
     * @param  \App\CourseBundleBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function issue(Request $request, CourseBundleBooking $booking)
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        $issue = TrainerIssue::updateOrCreate([

            'booking_id' => $booking->id,
            'booking_type' => 'App\CourseBundleBooking',
            'customer_id' => $customer->id,

        ], array_merge( $request->only('message'), [

            'booking_type' => 'App\CourseBundleBooking',
            'booking_id' => $booking->id,
            'customer_id' => $customer->id,
        ]) );

        $issue->trainers()->sync($request->trainers);

        return back()->with('success', 'Your trainer issue has been saved');
    }
}

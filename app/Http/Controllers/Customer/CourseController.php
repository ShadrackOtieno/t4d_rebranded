<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\CourseBooking;
use App\Customer;
use App\CourseReview;
use App\TrainerIssue;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Customer::whereUserId( Auth::id() )->first()->bookings()->latest()->paginate(10);

        return view('front/customer/account/course/index', compact('bookings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(CourseBooking $booking)
    {
        $booking->load('schedule', 'course');

        return view('front/customer/account/course/show', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function feedback(CourseBooking $booking)
    {
        $booking->load('course');

        return view('front/customer/account/course/feedback', compact('booking'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \use Illuminate\Http\Request  $request
     * @param  \App\CourseBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function review(Request $request, CourseBooking $booking)
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        CourseReview::updateOrCreate([

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
     * @param  \App\CourseBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function issue(Request $request, CourseBooking $booking)
    {
        $customer = Customer::whereUserId( Auth::id() )->first();

        $issue = TrainerIssue::updateOrCreate([

            'booking_id' => $booking->id,
            'booking_type' => 'App\CourseBooking',
            'customer_id' => $customer->id,

        ], array_merge($request->only('message'), [

            'booking_id' => $booking->id,
            'booking_type' => 'App\CourseBooking',
            'customer_id' => $customer->id,
        ]) );

        $issue->trainers()->sync($request->trainers);

        return back()->with('success', 'Your trainer issue has been saved');
    }
}

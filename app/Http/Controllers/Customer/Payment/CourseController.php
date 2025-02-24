<?php

namespace App\Http\Controllers\Customer\Payment;

use App\Http\Controllers\Controller;
use App\PaymentLog;
use App\CourseBooking;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\CourseBooking  $booking
     * @return \Illuminate\Http\Response
     */
    public function index(CourseBooking $booking)
    {
        $payments = $booking->paymentLogs()->latest()->paginate(10);

        return view('front/customer/account/payment/course/index', compact('booking', 'payments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseBooking  $booking
     * @param  \App\PaymentLog  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(CourseBooking $booking, PaymentLog $payment)
    {
        return view('front/customer/account/payment/course/show', compact('booking', 'payment'));
    }
}

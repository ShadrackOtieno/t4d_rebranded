<?php

namespace App\Http\Controllers\Backoffice\Payment\Log;

use App\Http\Controllers\Controller;
use App\PaymentLog;
use App\Payment;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Payment $payment)
    {
        $payment_logs = $payment->item->paymentLogs()->when($request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"

                )->orWhere(

                    'status', 'like', "%$search%"

                )->orWhere(

                    'effect', 'like', "%$search%"

                )->orWhere(

                    'method', 'like', "%$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice.payment.tour.log.index', compact('payment_logs', 'payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLog $paymentLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentLog  $paymentLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLog $paymentLog)
    {
        //
    }
}

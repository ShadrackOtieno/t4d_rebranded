<?php

namespace App\Http\Controllers\Backoffice\Payment;

use App\PaymentLog;
use App\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Payment\Log\StoreRequest;

class LogController extends Controller
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
        $logs = $payment->item->paymentLogs()->when($request->search, function ($query, $search) {

            $query->where( function ($query) use ($search) {

                $query->where(

                    'id', 'like', "$search%"
                );
            });

        })->latest()->paginate(10)->appends( $request->query() );

        return view('backoffice/payment/log/index', compact('logs', 'payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function create(Payment $payment)
    {
        return view('backoffice/payment/log/create', compact('payment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Payment\Log\StoreRequest  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Payment $payment)
    {
        $payment->item->paymentLogs()->create( array_merge(

            $request->only([

                'amount', 'method', 'currency', 'effect', 'reason'
                
            ]), ['currency' => $payment->currency]
        ));

        return back()->with('success', 'Payment has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @param  \App\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment, PaymentLog $log)
    {
        return view('backoffice/payment/log/edit', compact('payment', 'log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Payment\Log\StoreRequest  $request
     * @param  \App\Payment  $payment
     * @param  \App\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Payment $payment, PaymentLog $log)
    {
        $log->update( $request->only([

            'amount', 'method', 'effect', 'reason', 'date_approved', 'date_received', 'status',
        ]) );

        return back()->with('success', 'Payment log has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @param  \App\PaymentLog  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment, PaymentLog $log)
    {
        $log->delete();

        return back()->with('success', 'Payment log has been deleted');
    }
}

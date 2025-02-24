<?php

namespace App\Http\Controllers\Backoffice\Payment\Log;

use App\Http\Controllers\Controller;
use App\PaymentLog;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Payment\Log\StoreRequest;

class CourseController extends Controller
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

        return view('backoffice.payment.course.log.index', compact('payment_logs', 'payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function create(Payment $payment)
    {
        return view('backoffice.payment.course.log.create', compact('payment'));
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
     * @param  \App\PaymentLog  $payment_log
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment, PaymentLog $payment_log)
    {
        return view('backoffice.payment.course.log.edit', compact('payment', 'payment_log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Payment\Log\StoreRequest  $request
     * @param  \App\Payment  $payment
     * @param  \App\PaymentLog  $payment_log
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Payment $payment, PaymentLog $payment_log)
    {
        $payment_log->update( $request->only([

            'amount', 'method', 'effect', 'reason', 'date_approved', 'date_received', 'status',
        ]) );

        return back()->with('success', 'Payment log has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @param  \App\PaymentLog  $payment_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment, PaymentLog $payment_log)
    {
        $payment_log->delete();

        return back()->with('success', 'Payment log has been deleted');
    }
}

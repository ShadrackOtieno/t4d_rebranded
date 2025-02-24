<?php

namespace App\Http\Controllers\Course\Payment\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentLog;
use App\PaypalPayment;
use App\Http\Controllers\Traits\PaypalTrait;
use Session;

class PaypalController extends Controller
{
    use PaypalTrait;

    /** 
     * Request customer to make payment.
     *
     * @param  \App\PaymentLog  $payment
     * @return \Illuminate\Http\Response
     */
    public function create(PaymentLog $payment)
    {
        $response = $this->createPayment(

            $payment->amount,
            $payment->currency, 
            route('course.payment.log.paypal.execute'),
            route('course.payment.log.paypal.cancel', $payment)
        );

        if ( $response['status'] == 'failed' ) {

            Session::flash('error', 'Failed to request payment. Please try again');

            return back();
        }

        $payment->paypal()->create($response);

        return redirect( $response['approval_url'] );
    }

    /** 
     * Save payment after customer approves.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function execute(Request $request)
    {
        $paypal_payment = PaypalPayment::wherePaymentId($request->paymentId)->with('item_payment')->first();

        $response = $this->executePayment(

            $request->paymentId,
            $request->PayerID
        );

        if ( $response['status'] == 'failed' ) {

            $paypal_payment->delete();

            Session::flash('error', 'Your payment approval has been canceled');
        }
        else {

            $paypal_payment->update($response);

            # set payment status as complete on paypal observer class

            Session::flash('success', 'Payment has been received');
        }

        return redirect()->route('customer.account.course.payment.show', [

        	'booking' => $paypal_payment->item_payment->item_id,
        	'payment' => $paypal_payment->item_payment->id,
        ]);
    }

    /**
     * Cancel payment after failure.
     * 
     * @param  \App\PaymentLog  $payment
     * @return \Illuminate\Http\Response
     */
    public function cancel(PaymentLog $payment)
    {
        $payment->paypal()->delete();

        return redirect()->route('customer.account.course.payment.show', [

        	'course' => $payment->item_id,
        	'payment' => $payment->id,

        ])->with('error', 'Your payment has been canceled.');
    }
}

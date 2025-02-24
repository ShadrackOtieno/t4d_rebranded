<?php

namespace App\Observers;

use App\PaypalPayment;
use App\Payment;

class PaypalPaymentObserver
{
    /**
     * Handle the paypal payment "created" event.
     *
     * @param  \App\PaypalPayment  $paypal_payment
     * @return void
     */
    public function created(PaypalPayment $paypal_payment)
    {
        //
    }

    /**
     * Handle the paypal payment "updated" event.
     *
     * @param  \App\PaypalPayment  $paypal_payment
     * @return void
     */
    public function updated(PaypalPayment $paypal_payment)
    {
        if ( @$paypal_payment->getChanges()['status'] == 'approved' )

            $paypal_payment->item_payment->update([

                'status' => 'completed',
                'date_received' => now(),
            ]);
    }

    /**
     * Handle the paypal payment "deleted" event.
     *
     * @param  \App\PaypalPayment  $paypal_payment
     * @return void
     */
    public function deleted(PaypalPayment $paypal_payment)
    {
        //
    }

    /**
     * Handle the paypal payment "restored" event.
     *
     * @param  \App\PaypalPayment  $paypal_payment
     * @return void
     */
    public function restored(PaypalPayment $paypal_payment)
    {
        //
    }

    /**
     * Handle the paypal payment "force deleted" event.
     *
     * @param  \App\PaypalPayment  $paypal_payment
     * @return void
     */
    public function forceDeleted(PaypalPayment $paypal_payment)
    {
        //
    }
}

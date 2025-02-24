<?php

namespace App\Observers;

use App\Payment;
use App\Venue;
use App\Mail\Customer\Payment\InvoiceMail;
use App\Mail\Admin\Payment\SettlementMail as AdminSettlementMail;
use App\Mail\Customer\Payment\SettlementMail as CustomerSettlementMail;
use Mail;

class PaymentObserver
{
//    /**
//     * Handle the payment "created" event.
//     *
//     * @param  \App\Payment  $payment
//     * @return void
//     */
//    public function created(Payment $payment)
//    {
//        Mail::to($payment->item->customer->account)->send(
//
//            new InvoiceMail($payment)
//        );
//    }

    /**
     * Handle the payment "updated" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function updated(Payment $payment)
    {
        if ( @$payment->getChanges()['status'] == 'completed' ) {

            # notify admin of payment

            Mail::to(

                Venue::whereCountry($payment->item->country)->first()->email ?? config('mail.admin.address')

            )->send(

                new AdminSettlementMail($payment)
            );

            # send invoice to customer on completed payment

            Mail::to(

                $payment->item->customer->account

            )->send(

                new CustomerSettlementMail($payment)
            );
        }
    }

    /**
     * Handle the payment "deleted" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function deleted(Payment $payment)
    {
        //
    }

    /**
     * Handle the payment "restored" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function restored(Payment $payment)
    {
        //
    }

    /**
     * Handle the payment "force deleted" event.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function forceDeleted(Payment $payment)
    {
        //
    }
}

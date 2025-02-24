<?php

namespace App\Mail\Customer\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Payment;
use App\Venue;

class SettlementMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Payment.
     *
     * @var \App\Payment
     */
    public $payment;

    /**
     * Create a new message instance.
     *
     * @param  \App\Payment  $payment
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ( $this->payment->item_type ) {

            case 'App\CourseBooking':
                $view = 'mail.customer.payment.settlement.course';
                break;

            case 'App\CourseBundleBooking':
                $view = 'mail.customer.payment.settlement.bundle';
                break;

            case 'App\CertificationBooking':
                $view = 'mail.customer.payment.settlement.certification';
                break;

            case 'App\CertificationBundleBooking':
                $view = 'mail.customer.payment.settlement.certification_bundle';
                break;
            
            default:
                # code...
                break;
        }

        return $this->from(

                        Venue::whereCountry($this->payment->item->country)->first()->email ?? config('mail.admin.address')
                    )
                    ->subject('Payment Settlement')
                    ->markdown($view);
    }
}

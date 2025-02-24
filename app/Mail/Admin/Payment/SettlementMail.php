<?php

namespace App\Mail\Admin\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Payment;

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
                $view = 'mail.admin.payment.settlement.course';
                break;

            case 'App\CourseBundleBooking':
                $view = 'mail.admin.payment.settlement.bundle';
                break;

            case 'App\CertificationBooking':
                $view = 'mail.admin.payment.settlement.certification';
                break;

            case 'App\CertificationBundleBooking':
                $view = 'mail.admin.payment.settlement.certification_bundle';
                break;
            
            default:
                # code...
                break;
        }
        return $this->subject('Payment Settlement')
                    ->markdown($view);
    }
}

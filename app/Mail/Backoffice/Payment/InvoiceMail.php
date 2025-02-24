<?php

namespace App\Mail\Backoffice\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Payment;
use PDF;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Payment.
     *
     * @var \App\Payment
     */
    public $payment;

    /**
     * Invoice message.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @param  \App\Payment  $payment
     * @param  string  $message
     * @return void
     */
    public function __construct(Payment $payment, $message)
    {
        $this->payment = $payment;
        $this->message = $message;
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
                $view = 'mail.backoffice.payment.invoice.course';
                break;

            case 'App\CourseBundleBooking':
                $view = 'mail.backoffice.payment.invoice.bundle';
                break;

            case 'App\CertificationBooking':
                $view = 'mail.backoffice.payment.invoice.certification';
                break;

            case 'App\CertificationBundleBooking':
                $view = 'mail.backoffice.payment.invoice.certification_bundle';
                break;

            case 'App\TourBooking':
                $view = 'mail.backoffice.payment.invoice.tour';
                break;

            case 'App\HotelReservation':
                $view = 'mail.backoffice.payment.invoice.hotel_reservation';
                break;

            case 'App\SoftwareQuotation':
                $view = 'mail.backoffice.payment.invoice.software';
                break;

            case 'App\Program\ProgramBooking':
                $view = 'mail.backoffice.payment.invoice.program';
                break;

            default:
                # code...
                break;
        }

        $attachment = ( PDF::loadView('backoffice/payment/export/invoice', [

            'payment' => $this->payment,

        ]) )->stream();

        return $this->subject('Invoice Statement')
                    ->markdown($view)
                    ->attachData($attachment, 'Invoice.pdf');
    }
}

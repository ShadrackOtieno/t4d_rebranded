<?php

namespace App\Mail\Customer\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Payment;
use App\Venue;

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
                $view = 'mail.customer.payment.invoice.course';
                break;

            case 'App\CourseBundleBooking':
                $view = 'mail.customer.payment.invoice.bundle';
                break;

            case 'App\TourBooking':
                $view = 'mail.customer.payment.invoice.tour';
                break;

            case 'App\SoftwareQuotation':
                $view = 'mail.customer.payment.invoice.software';
                break;

            case 'App\HotelReservation':
                $view = 'mail.customer.payment.invoice.hotel_reservation';
                break;

            case 'App\CertificationBooking':
                $view = 'mail.customer.payment.invoice.certification';
                break;

            case 'App\Program\ProgramBooking':
                $view = 'mail.backoffice.payment.invoice.program';
                break;

            case 'App\CertificationBundleBooking':
                $view = 'mail.customer.payment.invoice.certification_bundle';
                break;

            default:
                # code...
                break;
        }

        return $this->from(
                        @Venue::whereCountry($this->payment->item->customer->country)->first()->email ?? config('mail.admin.address')
                    )
                    ->subject(

                        "Payment Settlement Request"
                    )
                    ->markdown($view);
    }
}

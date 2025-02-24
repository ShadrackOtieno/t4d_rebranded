<?php

namespace App\Mail\Tour;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\TourBooking;
use PDF;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Tour booking details.
     *
     * @var TourBooking
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @param TourBooking $booking
     * @return void
     */
    public function __construct(TourBooking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachment = ( PDF::loadView('backoffice/payment/export/invoice', [
            'payment' => $this->booking->payment,
        ]) )->stream();

        return $this->subject(
            "Invoice for {$this->booking->tour->name} - " . $this->booking->created_at->format('F j Y')
        )->attachData(
            $attachment, 'Invoice.pdf'
        )->markdown('mail/tour/booking');
    }
}

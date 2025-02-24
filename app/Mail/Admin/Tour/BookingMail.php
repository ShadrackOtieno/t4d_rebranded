<?php

namespace App\Mail\Admin\Tour;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\TourBooking;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Booking details.
     * 
     * @var \App\TourBooking
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @param  \App\TourBooking  $booking
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
        return $this->subject('Tour Booking')
                    ->markdown('mail.admin.tour.booking');
    }
}

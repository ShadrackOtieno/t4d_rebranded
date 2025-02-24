<?php

namespace App\Mail\HotelReservation;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\HotelReservation;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Hotel reservation.
     *
     * @var \App\HotelReservation
     */
    public $reservation;

    /**
     * Create a new message instance.
     *
     * @param  \App\HotelReservation  $reservation
     * @return void
     */
    public function __construct(HotelReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Hotel Reservation')
                    ->markdown('mail.hotel_reservation.admin.reservation');
    }
}

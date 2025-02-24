<?php

namespace App\Mail\Admin\Certification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CertificationBooking;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Booking details.
     * 
     * @var \App\CertificationBooking
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @param  \App\CertificationBooking  $booking
     * @return void
     */
    public function __construct(CertificationBooking $booking)
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
        return $this->subject('Certification Registration')
                    ->markdown('mail.admin.certification.registration');
    }
}

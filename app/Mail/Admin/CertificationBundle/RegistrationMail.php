<?php

namespace App\Mail\Admin\CertificationBundle;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CertificationBundleBooking;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Booking details.
     * 
     * @var \App\CertificationBundleBooking
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @param  \App\CertificationBundleBooking  $booking
     * @return void
     */
    public function __construct(CertificationBundleBooking $booking)
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
                    ->markdown('mail.admin.certification.bundle.registration');
    }
}

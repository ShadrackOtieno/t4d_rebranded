<?php

namespace App\Mail\CertificationBundle;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CertificationBundleBooking;
use PDF;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Booking details.
     * 
     * @var \App\CourseBooking
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
        $attachment = ( PDF::loadView('backoffice/payment/export/invoice', [

            'payment' => $this->booking->payment,

        ]) )->stream();
        
        return $this->subject(

            "Invoice for {$this->booking->certificationBundle->name} - " . $this->booking->created_at->format('F j Y')

        )->attachData(

            $attachment, 'Invoice.pdf'

        )->attach( base_path('pre-training-form.docx'), [

            'as' => 'Pre-training Form.docx',

        ])->markdown('mail.certification.bundle.registration');
    }
}

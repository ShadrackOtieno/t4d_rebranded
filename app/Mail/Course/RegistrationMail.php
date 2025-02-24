<?php

namespace App\Mail\Course;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CourseBooking;
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
     * @param  \App\CourseBooking  $booking
     * @return void
     */
    public function __construct(CourseBooking $booking)
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
        $invoice = ( PDF::loadView('backoffice/payment/export/invoice', [
            'payment' => $this->booking->payment,
        ]))
        ->stream();

        $invite = ( PDF::loadView('backoffice/customer/export/invite', [
            'course' => $this->booking->course,
            'schedule' => $this->booking->schedule,
            'booking' => $this->booking,
        ]))
        ->stream();

        return $this->subject(
            "Invoice for {$this->booking->course->name} - " . $this->booking->created_at->format('F j Y')
        )
        ->attachData(
            $invoice, 'Invoice.pdf'
        )
        ->attachData(
            $invite, 'Invitation to Training.pdf'
        )
        ->attach( base_path('pre-training-form.docx'), [
            'as' => 'Pre-Training Form.docx',
        ])
        ->attach( base_path('pre-training-form.docx'), [
            'as' => 'Pre-Training Form.docx',
        ])
        ->markdown('mail/course/registration');
    }
}

<?php

namespace App\Mail\Course;

use App\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\CourseBooking;
use PDF;

class InvoiceCreationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Booking details.
     *
     * @var \App\CourseBooking
     */
    public $group_booking;
    public $payment;

    /**
     * Create a new message instance.
     *
     * @param  \App\CourseBooking  $group_booking
     * @param  \App\Payment  $payment
     * @return void
     */
    public function __construct(CourseBooking $group_booking, Payment $payment)
    {
        $this->group_booking = $group_booking;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice = ( PDF::loadView('backoffice/payment/export/invoice', [
            'payment' => $this->payment,
        ]))
        ->stream();

        $invite = ( PDF::loadView('backoffice/customer/export/invite', [
            'course' => $this->group_booking->course,
            'schedule' => $this->group_booking->schedule,
            'booking' => $this->group_booking,
        ]))
        ->stream();

        return $this->subject(
            "Invoice for {$this->group_booking->course->name} - " . $this->group_booking->created_at->format('F j Y')
        )
        ->attachData(
            $invoice, 'Invoice.pdf'
        )
        ->attachData(
            $invite, 'Invite.pdf'
        )
        ->attach( base_path('pre-training-form.docx'), [
            'as' => 'Pre-training Form.docx',
        ])
        ->attach( base_path('pre-training-form.docx'), [
            'as' => 'Pre-training Form.docx',
        ])
        ->markdown('mail/course/invoice-registration');
    }
}

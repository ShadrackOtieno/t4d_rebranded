<?php

namespace App\Mail\Program;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Program\ProgramBooking;
use PDF;
use stdClass;

class ProgramBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ProgramBooking $booking)
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

        return $this->subject(
            "Invoice for {$this->booking->program->name} - " . $this->booking->created_at->format('F j Y')
        )
        ->attachData(
            $invoice, 'Progam Invoice.pdf'
        )
        ->markdown('mail/program/registration');
    }
}

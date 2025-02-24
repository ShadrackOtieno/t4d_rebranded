<?php

namespace App\Mail;

use App\Currency;
use App\CustomForm;
use App\Venue;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class CustomEventBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Booking details.
     *
     * @var CustomForm
     */
    public $booking;

    /**
     * Create a new message instance.
     *
     * @param  CustomForm  $booking
     * @return void
     */
    public function __construct(CustomForm $booking)
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
        $country = Venue::where('country', 'Kenya')->first();
        if($this->booking->currency_fee == 'USD') {
            $fee = 'usd_fee';
            $bank = Currency::where([['code', $this->booking->currency_fee],
                ['venue_id', $country->id]])->first();
        }else{
            $fee = 'kes_fee';
            $bank = Currency::where('code', $this->booking->currency_fee)->first();
        }
        $invoice = ( PDF::loadView('backoffice.events.invoice', [
            'booking' => $this->booking, 'fee'=>$fee, 'bank'=>$bank
        ]))->stream();


        return $this->subject(
            "Invoice for {$this->booking->event} - " . $this->booking->created_at->format('F j Y')
        )
            ->attachData(
                $invoice, 'Invoice.pdf'
            )
            ->markdown('mail/event-booking');
    }
}

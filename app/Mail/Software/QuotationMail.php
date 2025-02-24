<?php

namespace App\Mail\Software;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SoftwareQuotation;
use PDF;

class QuotationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Quotation details.
     * 
     * @var App\SoftwareQuotation
     */
    public $quotation;

    /**
     * Create a new message instance.
     *
     * @param  \App\SoftwareQuotation  $quotation
     * @return void
     */
    public function __construct(SoftwareQuotation $quotation)
    {
        $this->quotation = $quotation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attachment = ( PDF::loadView('backoffice/payment/export/invoice', [

            'payment' => $this->quotation->payment,

        ]) )->stream();

        return $this->subject(

            "Invoice for {$this->quotation->software->name} - " . $this->quotation->created_at->format('F j Y')

        )->attachData(

            $attachment, 'Invoice.pdf'

        )->markdown('mail/software/quotation');
    }
}

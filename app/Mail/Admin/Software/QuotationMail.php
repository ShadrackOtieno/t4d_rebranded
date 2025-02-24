<?php

namespace App\Mail\Admin\Software;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SoftwareQuotation;

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
        return $this->subject('New Software Quotation Request')
                    ->markdown('mail/admin/software/quotation');
    }
}

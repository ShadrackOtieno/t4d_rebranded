<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\Course\InvoiceCreationMail as CustomerBookingMail;

class InvoiceCreationProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $payment;
    public $group_booking;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payment, $group_booking)
    {
        $this->payment = $payment;
        $this->group_booking = $group_booking;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::to($this->payment->customer->work_email)->send(
            new CustomerBookingMail($this->group_booking, $this->payment)
        );
    }
}

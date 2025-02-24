<?php

namespace App\Traits;

use App\Payment;
use App\PaymentLog;

trait Invoice
{
	/**
     * Payment.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function payment()
    {
        return $this->morphOne(Payment::class, 'item');
    }

    /**
     * Payments that affect the total cost.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function paymentLogs()
    {
        return $this->morphMany(PaymentLog::class, 'item');
    }
}
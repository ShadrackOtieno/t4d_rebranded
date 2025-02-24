<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaypalPayment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_payment_id', 'transaction_id', 'payment_id', 'amount', 'transaction_fee', 'status', 'item_payment_type',
    ];

    /**
     * Payment.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function item_payment()
    {
        return $this->morphTo();
    }
}

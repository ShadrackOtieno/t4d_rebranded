<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_approved', 'amount', 'status', 'method', 'item_id', 'item_type', 'date_received', 'currency', 'effect', 'reason',
    ];

    /**
	 * Get model owning the payment.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
    public function item()
    {
    	return $this->morphTo();
    }

    /**
     * Paypal transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function paypal()
    {
        return $this->morphOne(PaypalPayment::class, 'item_payment');
    }
}

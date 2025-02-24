<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelReservation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'customer_id', 'check_in', 'check_out', 'flight', 'rooms', 'visa', 'airport_transfer'
    ];

    /**
     * Customer.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

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
     * Payment logs.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function paymentLogs()
    {
        return $this->morphMany(PaymentLog::class, 'item');
    }
}

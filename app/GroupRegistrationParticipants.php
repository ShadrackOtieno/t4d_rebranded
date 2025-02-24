<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRegistrationParticipants extends Model
{
    protected $fillable = ['booking_id', 'customer_id'];
    

    /**
     * Customer details.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

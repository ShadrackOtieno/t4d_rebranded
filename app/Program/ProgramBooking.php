<?php

namespace App\Program;

use Illuminate\Database\Eloquent\Model;

class ProgramBooking extends Model
{
    protected $guarded = [];

    public function participants()
    {
        return $this->hasMany(ProgramParticipant::class, 'program_booking_id');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'user_id', 'user_id');
    }

    public function program()
    {
    	return $this->belongsTo(Program::class);
    }

    /**
     * Payment.
     */
    public function payment()
    {
        return $this->morphOne('App\Payment', 'item');
    }

    /**
     * Payment logs.
     */
    public function paymentLogs()
    {
        return $this->morphMany('App\PaymentLog', 'item');
    }
}

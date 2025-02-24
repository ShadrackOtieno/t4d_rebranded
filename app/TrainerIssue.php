<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerIssue extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'staff_id', 'booking_id', 'message', 'status', 'booking_type',
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
     * Booking.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function booking()
    {
        return $this->morphTo();
    }

    /**
     * Trainers.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainers()
    {
        return $this->belongsToMany(Staff::class);
    }
}

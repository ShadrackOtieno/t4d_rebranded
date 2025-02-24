<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationBookingParticipant extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'certification_booking_id', 'name', 'phone', 'email',
    ];

    /**
     * Certification booking.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function booking()
    {
        return $this->belongsTo(CertificationBooking::class, 'certification_booking_id');
    }

    /**
     * Capitalize name.
     * 
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
}

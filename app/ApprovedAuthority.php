<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovedAuthority extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'company_id', 'designation', 'phone', 'country_code',
    ];

    /**
     * Course bookings.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(CourseBooking::class, 'approved_authority_id');
    }

    /**
     * Company.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
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

    /**
     * Phone number with country code.
     * 
     * @return string
     */
    public function getPhoneAttribute($value)
    {
        return $this->country_code ? '+' . $this->country_code . $value : $value;
    }
}

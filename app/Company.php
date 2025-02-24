<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'office_address', 'city', 'country', 'logo', 'status', 'industry',
        'segment_id', 'sector_id', 'subsector_id'
    ];

    /**
     * Current employees.
     *
     * @return BelongsToMany
     */
    public function currentEmployees()
    {
        return $this->belongsToMany('App\Customer', 'employees')->withPivot('status')->wherePivot('status', 'current');
    }

    /**
     * Past employees.
     *
     * @return BelongsToMany
     */
    public function pastEmployees()
    {
        return $this->belongsToMany('App\Customer', 'employees')->withPivot('status')->wherePivot('status', 'past');
    }

    /**
     * Industry.
     *
     * @return BelongsTo
     */
    public function industries()
    {
        return $this->belongsTo(Industry::class, 'industry');
    }

    /**
     * Segment.
     *
     * @return BelongsTo
     */
    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

    /**
     * course booking.
     *
     * @return HasMany
     */
    public function courseBookings()
    {
        return $this->hasMany(CourseBooking::class, 'company_id');
    }

    /**
     * Sector.
     *
     * @return BelongsTo
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    /**
     * Approved authorities.
     *
     * @return HasMany
     */
    public function approvedAuthorities()
    {
        return $this->hasMany(ApprovedAuthority::class, 'company_id');
    }

    /**
     * Offices.
     *
     * @return HasMany
     */
    public function branches()
    {
        return $this->hasMany(Office::class, 'company_id');
    }

    /**
     * Capitalize name.
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}

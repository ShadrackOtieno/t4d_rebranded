<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'designation', 'company_id', 'country', 'phone', 'work_email', 'user_id', 'salutation',
    ];

    /**
     * Account details.
     *
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Company.
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Course bookings.
     *
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(CourseBooking::class, 'customer_id');
    }

    /**
     * Course bundle bookings.
     *
     * @return HasMany
     */
    public function bundleBookings(): HasMany
    {
        return $this->hasMany(CourseBundleBooking::class, 'customer_id');
    }

    /**
     * Certification bookings.
     *
     * @return HasMany
     */
    public function certificationBookings(): HasMany
    {
        return $this->hasMany(CertificationBooking::class, 'customer_id');
    }

    /**
     * Certification bundle bookings.
     *
     * @return HasMany
     */
    public function certificationBundleBookings(): HasMany
    {
        return $this->hasMany(CertificationBundleBooking::class, 'customer_id');
    }

    /**
     * Tour bookings.
     *
     * @return HasMany
     */
    public function tourBookings(): HasMany
    {
        return $this->hasMany(TourBooking::class, 'customer_id');
    }

    /**
     * Software quotes.
     *
     * @return HasMany
     */
    public function softwareQuotes(): HasMany
    {
        return $this->hasMany(SoftwareQuotation::class, 'customer_id');
    }

    /**
     * Hotel reservations.
     *
     * @return HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(HotelReservation::class, 'customer_id');
    }

    /**
     * Get the staff's full name.
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucwords("$this->salutation $this->first_name $this->last_name");
    }
}

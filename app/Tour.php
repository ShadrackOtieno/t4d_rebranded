<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'country', 'city', 'category_id', 'subcategory_id', 'cover', 'itinerary', 'description', 'featured', 'tax', 'itinerary_desc', 'minimum_no_people', 'readily_available', 'slug',
    ];

    /**
     * Schedule dates.
     *
     * @return HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(TourSchedule::class, 'tour_id');
    }

    /**
     * Industries.
     *
     * @return BelongsToMany
     */
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(ServiceIndustry::class);
    }

    /**
     * Tour bookings.
     *
     * @return HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(TourBooking::class, 'tour_id');
    }

    /**
     * Category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault([

            'name' => 'Default',
            'type' => 'tour',
            'cover' => '',
            'description' => '',
        ]);
    }

    /**
     * Subcategory.
     *
     * @return BelongsTo
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    /**
     * Gallery.
     *
     * @return MorphMany
     */
    public function gallery(): MorphMany
    {
        return $this->morphMany('App\Gallery', 'owner');
    }

    /**
     * Amount on selected currencies.
     *
     * @return MorphToMany
     */
    public function currencies(): MorphToMany
    {
        return $this->morphToMany('App\Currency', 'item', 'currencies_costs')->withPivot('amount');
    }

    /**
     * Customer reviews.
     *
     * @return HasManyThrough
     */
    public function reviews(): HasManyThrough
    {
        return $this->hasManyThrough('App\TourReview', 'App\TourBooking', 'tour_id', 'booking_id');
    }

    /**
     * Documents.
     *
     * @return MorphMany
     */
    public function documents(): MorphMany
    {
        return $this->morphMany('App\Document', 'owner');
    }

    /**
     * Customer enquiries.
     *
     * @return MorphMany
     */
    public function enquiries(): MorphMany
    {
        return $this->morphMany(Enquiry::class, 'item');
    }

    /**
     * Customer referrals.
     *
     * @return MorphMany
     */
    public function referrals()
    {
        return $this->morphMany(Referral::class, 'item');
    }

    /**
     * Capitalized name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Duration in days.
     *
     * @return string
     */
    public function getDurationAttribute()
    {
        $start_date = date_create($this->from);
        $end_date = date_create($this->to);

        $duration = date_diff($start_date, $end_date);

        return $duration->format('%a');
    }

    /**
     * Location.
     *
     * @param  string  $value
     * @return string
     */
    public function getVenueAttribute($value)
    {
        return Venue::whereCountry($this->country)->first() ?? Venue::hydrate([

            'email' => config('headoffice.email'),
            'phone' => config('headoffice.phone'),
            'tax' => config('headoffice.tax'),
            'reg_no' => config('headoffice.reg_no'),
            'tax_pin' => config('headoffice.tax_pin'),
        ]);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

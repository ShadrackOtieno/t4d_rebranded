<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'venue_id', 'cover','description'
    ];

    /**
     * Venue.
     *
     * @return BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id')->withDefault([
            'country' => config('headoffice.country'),
            'email' => config('headoffice.email'),
            'phone' => config('headoffice.phone'),
            'tax' => config('headoffice.tax'),
            'reg_no' => config('headoffice.reg_no'),
            'tax_pin' => config('headoffice.tax_pin'),
        ]);
    }

    /**
     * Face to face occurrences.
     *
     * @return HasMany
     */
    public function physicalClasses(): HasMany
    {
        return $this->hasMany(PhysicalClass::class, 'city_id');
    }

    /**
     * Face to face certifications.
     *
     * @return HasMany
     */
    public function physicalCertifications(): HasMany
    {
        return $this->hasMany(PhysicalCertification::class, 'city_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country', 'email', 'phone', 'tax', 'reg_no', 'tax_pin', 'head_office','cover','description'
    ];

    /**
     * Cities.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class, 'venue_id');
    }

    /**
     * Currencies.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function currencies()
    {
        return $this->morphMany(Currency::class, 'venue');
    }

    /**
     * Capitalize the country name.
     *
     * @param  string  $value
     * @return string
     */
    public function getCountryAttribute($value)
    {
        return ucfirst($value);
    }
}

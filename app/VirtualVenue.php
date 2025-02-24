<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualVenue extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'phone', 'tax',
    ];

    /**
     * Currencies.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function currencies()
    {
        return $this->morphMany(Currency::class, 'venue');
    }
}

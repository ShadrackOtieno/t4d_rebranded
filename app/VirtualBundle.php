<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualBundle extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_bundle_id', 'booking_start', 'booking_end', 'from', 'to', 'tax',
    ];

    /**
     * Course bundle.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseBundle()
    {
        return $this->belongsTo(CourseBundle::class, 'course_bundle_id');
    }

    /**
     * Amount of selected currencies.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function currencies()
    {
        return $this->morphToMany('App\Currency', 'item', 'currencies_costs')->withPivot('amount');
    }
}

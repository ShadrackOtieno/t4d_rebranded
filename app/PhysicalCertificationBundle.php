<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;
use DatePeriod;
use DateInterval;

class PhysicalCertificationBundle extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'certification_bundle_id', 'city_id', 'booking_start', 'booking_end', 'from', 'to', 'tax',
    ];

    /**
     * Certification bundle.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bundle()
    {
        return $this->belongsTo(CertificationBundle::class, 'certification_bundle_id');
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

    /**
     * City.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Get duration.
     *
     * @return int
     */
    public function getDurationAttribute()
    {
        $start = new DateTime($this->from);
        $end = new DateTime($this->to);
        
        // otherwise the  end date is excluded (bug?)
        $end->modify('+1 day');
        
        $interval = $end->diff($start);
        
        // total days
        $days = $interval->days;
        
        // create an iterateable period of date (P1D equates to 1 day)
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);
        
        foreach ($period as $dt) {
            
            $curr = $dt->format('D');
        
            if ($curr == 'Sat' or $curr == 'Sun')
                // substract if Saturday or Sunday
                $days--;
        }
        
        return $days;
    }
}

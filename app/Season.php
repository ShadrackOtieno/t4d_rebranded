<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'percentage', 'months',
    ];

    /**
     * Get low season months.
     * 
     * @return array
     */
    public function getMonthsAttribute($value)
    {
        return explode(' | ', $value);
    }
}

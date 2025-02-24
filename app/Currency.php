<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * Venue.
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function venue()
    {
    	return $this->morphTo();
    }

    /**
     * Uppercase code.
     *
     * @param  string  $value
     * @return string
     */
    public function getCodeAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Capitalize bank name.
     *
     * @param  string  $value
     * @return string
     */
    public function getBankNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Capitalize bank branch.
     *
     * @param  string  $value
     * @return string
     */
    public function getBankBranchAttribute($value)
    {
        return ucfirst($value);
    }
}

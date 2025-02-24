<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerApplication extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'country', 'city', 'specialization', 'document', 'comment'
    ];

    /**
     * Uppercase name.
     * 
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Capitalize country.
     * 
     * @return string
     */
    public function getCountryAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Capitalize city.
     * 
     * @return string
     */
    public function getCityAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Capitalize specialization.
     * 
     * @return string
     */
    public function getSpecializationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Capitalize comment.
     * 
     * @return string
     */
    public function getCommentAttribute($value)
    {
        return ucfirst($value);
    }
}

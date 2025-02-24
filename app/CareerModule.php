<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CareerModule extends Model
{
    //
    protected $fillable = ['Job_title', 'Category', 'Department', 'Experience', 'Description',
    'Requirements','Apply_before'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

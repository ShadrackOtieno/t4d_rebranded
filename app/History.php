<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['year', 'description'];
}

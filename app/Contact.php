<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'name', 'message', 'country', 'no_of_employees', 'phone', 'company', 'type', 'designation', 'learn_about_us'
    ];
}

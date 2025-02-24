<?php

namespace App\LandingPage;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['landing_page_id', 'banner_image', 'name_organization', 'message'];
}

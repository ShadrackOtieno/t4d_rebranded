<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Segment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug',
    ];
    

    /**
     * Sectors.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sectors()
    {
        return $this->hasMany(Sector::class, 'segment_id');
    }
    

    /**
     * Companies.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'segment_id');
    }
}

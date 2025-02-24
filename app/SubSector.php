<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSector extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sector_id', 'description', 'slug',
    ]; 
    

    /**
     * Industries.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function industries()
    {
        return $this->hasMany(Industry::class, 'subsector_id');
    }

    /**
     * Sector.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }


    /**
     * Companies.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'subsector_id');
    }
}

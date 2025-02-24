<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Sector extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'segment_id', 'description', 'slug',
    ];    
    

    /**
     * Subsectors.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subsectors()
    {
        return $this->hasMany(SubSector::class, 'sector_id');
    }

    /**
     * Segment.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function segment()
    {
        return $this->belongsTo(Segment::class, 'segment_id');
    }

    /**
     * Companies.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class, 'sector_id');
    }
}

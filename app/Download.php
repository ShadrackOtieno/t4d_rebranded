<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Download extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'organization', 'designation', 'document',
    ];

    /**
     * Capitalize name.
     * 
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Capitalize organization.
     * 
     * @return string
     */
    public function getOrganizationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Capitalize designation.
     * 
     * @return string
     */
    public function getDesignationAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Capitalize document.
     * 
     * @return string
     */
    public function getDocumentAttribute($value)
    {
        return ucfirst($value);
    }
}

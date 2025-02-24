<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'owner_id', 'owner_type'
    ];

    /**
     * Get the owning model.
     */
    public function owner()
    {
        return $this->morphTo();
    }
}

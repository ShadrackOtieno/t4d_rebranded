<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElearningCertification extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'certification_id', 'website',
    ];

    /**
     * Certification.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certification()
    {
        return $this->belongsTo(Certification::class, 'certification_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'user_id',
    ];

    /**
     * Account details.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the staff's full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return ucwords("{$this->first_name} {$this->last_name}");
    }
}

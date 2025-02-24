<?php

namespace App\Program;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = [];

    public function program()
    {
    	return $this->belongsTo(Program::class);
    }
}

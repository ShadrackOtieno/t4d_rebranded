<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Program\program;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TechStack extends Model
{
    //
    protected $fillable = ['name', 'logo'];

    public function programs(): BelongsToMany 
    {
        return $this->belongsToMany(Program::class);
    }
}

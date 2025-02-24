<?php

namespace App\Program;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Session extends Model
{
	use Sluggable;

    protected $guarded = [];

    public function module()
    {
        return $this->belongsTo(ProgramModule::class, 'program_module_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

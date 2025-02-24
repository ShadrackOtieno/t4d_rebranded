<?php
namespace App\Program;

use Illuminate\Database\Eloquent\Model;

class ProgramModule extends Model
{
	protected $guarded = [];

    public function program()
    {
    	return $this->belongsTo(Program::class);
    }

    public function module()
    {
    	return $this->belongsTo(Module::class);
    }

    public function sessions()
    {
    	return $this->hasMany(Session::class);
    }
}

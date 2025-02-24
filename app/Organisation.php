<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organisation extends Model
{
    protected $fillable = ['project_id','name','photo'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function projectpage(): belongsto{

        return $this->belongsto(ProjectPage::class);
    }
}

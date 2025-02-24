<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Organisation;
use App\ProjectPhoto;

class ProjectPage extends Model
{
    protected $fillable = ['title', 'excerpt', 'description','date_created','image',
                            'budget','location','started_on','ended_on','sector',
                            'nature','p_impacted','client','client_logo','region',
                            'industry','type'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Organisation associated with the ProjectPage.
     */
    public function organisations(): HasMany
    {
        return $this->hasMany(Organisation::class,'project_id');
    }

    
    /**
     * Get the ProjectPhoto associated with the ProjectPage.
     */
    public function projectphotos(): HasMany
    {
        return $this->hasMany(ProjectPhoto::class,'project_id');
    }
}

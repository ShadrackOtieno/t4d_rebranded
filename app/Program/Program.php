<?php

namespace App\Program;

use App\ProductsConfig\BCGLevel;
use App\ProductsConfig\PDCStage;
use App\ProductsConfig\SkillLevel;
use App\ProductsConfig\SkillType;
use App\ProductsConfig\TargetStaff;
use App\TechStack;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
	use Sluggable;

    protected $guarded = [];

    /**
     * BCG Levels.
     *
     * @return BelongsToMany
     */
    public function bcg_levels(): BelongsToMany
    {
        return $this->belongsToMany(BcgLevel::class);
    }

    /**
     * PDC Stages.
     *
     * @return BelongsToMany
     */
    public function pdc_stages(): BelongsToMany
    {
        return $this->belongsToMany(PDCStage::class);
    }

    /**
     * Skill Levels.
     *
     * @return BelongsToMany
     */
    public function skill_levels(): BelongsToMany
    {
        return $this->belongsToMany(SkillLevel::class);
    }

    /**
     * Skill Types.
     *
     * @return BelongsToMany
     */
    public function skill_types(): BelongsToMany
    {
        return $this->belongsToMany(SkillType::class);
    }

    /**
     * Target Staff.
     *
     * @return BelongsToMany
     */
    public function target_staffs(): BelongsToMany
    {
        return $this->belongsToMany(TargetStaff::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(ProgramModule::class)->orderBy('module_id', 'ASC');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class)->orderBy('program_module_id', 'ASC');
    }

    public function intakes(): HasMany
    {
        return $this->hasMany(Intake::class)->orderBy('created_at', 'ASC');
    }

    public function tools()
    {
     return $this->hasMany('App\Tool', 'program_id');
    }

    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    public function techstacks(): BelongsToMany
    {
        return $this->belongsToMany(TechStack::class);
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
                'source' => 'name'
            ]
        ];
    }
}

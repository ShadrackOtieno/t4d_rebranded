<?php

namespace App;

use App\ProductsConfig\BCGLevel;
use App\ProductsConfig\PDCStage;
use App\ProductsConfig\ProductType;
use App\ProductsConfig\SkillLevel;
use App\ProductsConfig\SkillType;
use App\ProductsConfig\TargetStaff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Course extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'subcategory_id', 'event_types', 'document', 'cover',
        'description', 'outline', 'module', 'code', 'featured', 'topic_id', 'level',
        'adminstration_details', 'slug', 'product_type_id', 'skill_type_id', 'skill_level_id',
        'target_staff_id', 'pdc_stage_id', 'bcg_level_id', 'banner_description', 'who_should_attend'
    ];

    /**
     * Category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault([
            'name' => 'Default',
            'type' => 'course',
            'cover' => '',
            'description' => '',
        ]);
    }

    /**
     * Subcategory.
     *
     * @return BelongsTo
     */
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    /**
     * Topic.
     *
     * @return BelongsTo
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
     * Trainers.
     *
     * @return BelongsToMany
     */
    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class, 'course_trainers');
    }

    /**
     * Recommended software.
     *
     * @return BelongsToMany
     */
    public function software(): BelongsToMany
    {
        return $this->belongsToMany(Software::class);
    }

    /**
     * Recommended tours.
     *
     * @return BelongsToMany
     */
    public function tours(): BelongsToMany
    {
        return $this->belongsToMany(Tour::class);
    }

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
     * Product Types.
     *
     * @return BelongsToMany
     */
    public function product_types(): BelongsToMany
    {
        return $this->belongsToMany(ProductType::class);
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

    /**
     * Industries.
     *
     * @return BelongsToMany
     */
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(ServiceIndustry::class);
    }

    /**
     * Face to face occurrences.
     *
     * @return HasMany
     */
    public function physicalClasses(): HasMany
    {
        return $this->hasMany(PhysicalClass::class, 'course_id');
    }

    /**
     * Virtual occurrences.
     *
     * @return HasMany
     */
    public function virtualClasses(): HasMany
    {
        return $this->hasMany(VirtualClass::class, 'course_id');
    }

    /**
     * E-learning website occurrence.
     *
     * @return HasOne
     */
    public function elearningClass(): HasOne
    {
        return $this->hasOne(ElearningClass::class, 'course_id');
    }

    /**
     * Documents.
     *
     * @return MorphMany
     */
    public function documents(): MorphMany
    {
        return $this->morphMany('App\Document', 'owner');
    }

    /**
     * Customer enquiries.
     *
     * @return MorphMany
     */
    public function enquiries(): MorphMany
    {
        return $this->morphMany(Enquiry::class, 'item');
    }

    /**
     * Customer referrals.
     *
     * @return MorphMany
     */
    public function referrals(): MorphMany
    {
        return $this->morphMany(Referral::class, 'item');
    }

    /**
     * Payment.
     *
     * @return MorphOne
     */
    public function payment(): MorphOne
    {
        return $this->morphOne('App\Payment', 'item');
    }

    /**
     * Types of events.
     *
     */
    public function getEventTypesAttribute($value): array
    {
        return explode(' | ', $value);
    }

    /**
     * Capitalize name.
     *
     */
    public function getNameAttribute($value): string
    {
        return ucfirst($value);
    }

    /**
     * Set course code.
     *
     * @param string $value
     * @return void
     */
    public function setCodeAttribute(string $value)
    {
        $this->attributes['code'] = $value ?? Str::random(4);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certification extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'subcategory_id', 'event_types', 'cover', 'description', 'outline', 'module', 'code', 'featured', 'topic_id', 'certifying_body_id', 'exam', 'prerequisite', 'slug',
    ];

    /**
     * Category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
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
     * Certifying body.
     *
     * @return BelongsTo
     */
    public function certifyingBody(): BelongsTo
    {
        return $this->belongsTo(CertifyingBody::class, 'certifying_body_id');
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
     * Trainers.
     *
     * @return BelongsToMany
     */
    public function trainers(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class);
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
     * Types of events.
     *
     * @return array
     */
    public function getEventTypesAttribute($value): array
    {
        return explode(' | ', $value);
    }

    /**
     * E-learning website occurrence.
     *
     * @return HasOne
     */
    public function elearningClass(): HasOne
    {
        return $this->hasOne(ElearningCertification::class, 'certification_id');
    }

    /**
     * Virtual website occurrence.
     *
     * @return HasMany
     */
    public function virtualClasses(): HasMany
    {
        return $this->hasMany(VirtualCertification::class, 'certification_id');
    }

    /**
     * Face to face occurrences.
     *
     * @return HasMany
     */
    public function physicalClasses(): HasMany
    {
        return $this->hasMany(PhysicalCertification::class, 'certification_id');
    }

    /**
     * Capitalize name.
     *
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucfirst($value);
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

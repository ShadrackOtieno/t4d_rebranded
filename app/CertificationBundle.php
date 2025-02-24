<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificationBundle extends Model
{
	use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'subcategory_id', 'event_types', 'cover', 'description', 'outline', 'module', 'code', 'featured', 'topic_id', 'certifying_body_id', 'exam', 'slug',
    ];

    /**
     * Category.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Subcategory.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    /**
     * Topic.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
     * Certifying body.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certifyingBody()
    {
        return $this->belongsTo(CertifyingBody::class, 'certifying_body_id');
    }

    /**
     * Documents.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function documents()
    {
        return $this->morphMany('App\Document', 'owner');
    }

    /**
     * Trainers.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainers()
    {
        return $this->belongsToMany(Staff::class);
    }

    /**
     * Recommended software.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function software()
    {
        return $this->belongsToMany(Software::class);
    }

    /**
     * Recommended tours.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }

    /**
     * Certifications.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function certifications()
    {
        return $this->belongsToMany(Certification::class);
    }

    /**
     * E-learning website occurrence.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elearningClass()
    {
        return $this->hasOne(ElearningCertificationBundle::class, 'certification_bundle_id');
    }

    /**
     * Face to face occurrences.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function physicalClasses()
    {
        return $this->hasMany(PhysicalCertificationBundle::class, 'certification_bundle_id');
    }

    /**
     * Virtual website occurrence.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function virtualClasses()
    {
        return $this->hasMany(VirtualCertificationBundle::class, 'certification_bundle_id');
    }

    /**
     * Types of events.
     * 
     * @return array
     */
    public function getEventTypesAttribute($value)
    {
        return explode(' | ', $value);
    }

    /**
     * Capitalize name.
     * 
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

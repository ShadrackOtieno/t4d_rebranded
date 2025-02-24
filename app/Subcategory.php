<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'description', 'cover', 'slug',
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
     * Courses.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class, 'subcategory_id');
    }

    /**
     * Softwares.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function software()
    {
        return $this->hasMany(Software::class, 'subcategory_id');
    }

    /**
     * Tours.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tours()
    {
        return $this->hasMany(Tour::class, 'subcategory_id');
    }

    /**
     * Topics.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class, 'subcategory_id');
    }

    /**
     * Certifications.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certifications()
    {
        return $this->hasMany(Certification::class, 'subcategory_id');
    }

    /**
     * Certification Bundles.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function certificationBundles()
    {
        return $this->hasMany(CertificationBundle::class, 'subcategory_id');
    }

    /**
     * Face to face occurrences.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function physicalClasses()
    {
        return $this->hasManyThrough(PhysicalClass::class, Course::class, 'subcategory_id', 'course_id');
    }

    /**
     * Virtual occurrences.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function virtualClasses()
    {
        return $this->hasManyThrough(VirtualClass::class, Course::class, 'subcategory_id', 'course_id');
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

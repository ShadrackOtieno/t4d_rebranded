<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;

class CourseBundle extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cover', 'description', 'outline', 'module', 'category_id', 'subcategory_id', 'code', 'featured', 'event_types', 'adminstration_details', 'slug', 'topic_id',
    ];

    /**
     * Courses.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class);
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
     * Category.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
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
     * Trainers.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainers()
    {
        return $this->belongsToMany(Staff::class, 'course_bundle_trainers');
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
     * Face to face occurrences.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function physicalBundles()
    {
        return $this->hasMany(PhysicalBundle::class, 'course_bundle_id');
    }

    /**
     * Virtual occurrences.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function virtualBundles()
    {
        return $this->hasMany(VirtualBundle::class, 'course_bundle_id');
    }

    /**
     * E-learning website occurrence.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function elearningBundle()
    {
        return $this->hasOne(ElearningBundle::class, 'course_bundle_id');
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
     * Set course code.
     *
     * @param  string $value
     * @return void
     */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = $value ?? Str::random(4);
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

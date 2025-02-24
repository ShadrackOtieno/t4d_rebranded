<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'cover', 'type', 'slug',
    ];

    /**
     * Scope a query to only include software categories.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSoftware(Builder $query): Builder
    {
        return $query->where('type', 'software');
    }

    /**
     * Scope a query to only include tour categories.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeTour(Builder $query): Builder
    {
        return $query->where('type', 'tour');
    }

    /**
     * Scope a query to only include course categories.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeCourse(Builder $query): Builder
    {
        return $query->where('type', 'course');
    }

    /**
     * Scope a query to only include certification categories.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeCertification(Builder $query): Builder
    {
        return $query->where('type', 'certification');
    }

    /**
     * Subcategories.
     *
     * @return HasMany
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    /**
     * Courses.
     *
     * @return HasManyThrough
     */
    public function courses(): HasManyThrough
    {
        return $this->hasManyThrough(Course::class, Subcategory::class, 'category_id', 'subcategory_id');
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

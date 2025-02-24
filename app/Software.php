<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    use SoftDeletes, CoverTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'category_id', 'brochure', 'highlights', 'description', 'subcategory_id', 'featured', 'cover', 'slug',
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
            'type' => 'software',
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
     * Industries.
     *
     * @return BelongsToMany
     */
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(ServiceIndustry::class);
    }

    /**
     * Gallery.
     *
     * @return MorphMany
     */
    public function gallery(): MorphMany
    {
        return $this->morphMany('App\Gallery', 'owner');
    }

    /**
     * Quotes.
     *
     * @return HasMany
     */
    public function quotes(): HasMany
    {
        return $this->hasMany('App\SoftwareQuotation', 'software_id');
    }

    /**
     * Capitalized name.
     *
     * @param  string  $value
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

    /**
     * Retrieve the order for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return Model|null
     */
    public function resolveRouteBinding($value, $field = null): ?Model
    {
        return $this->where($field ?? $this->getRouteKeyName(), $value)
                    ->orWhere('id', $value)
                    ->first() ?? abort(404);
    }
}

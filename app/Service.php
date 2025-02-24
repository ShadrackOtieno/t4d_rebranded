<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $guarded = [];

    /**
     * industries.
     *
     * @return BelongsToMany
     */
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(ServiceIndustry::class);
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
     * service capabilities.
     *
     * @return BelongsTo
     */
    public function capability(): BelongsTo
    {
        return $this->belongsTo(ServiceCapability::class, 'capability_id');
    }


    /**
     * Service tools.
     *
     * @return HasMany
     */
    public function tools(): HasMany
    {
        return $this->hasMany(ServiceTool::class);
    }
}

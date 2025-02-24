<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceCapability extends Model
{
    protected $guarded = [];


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
     * @return HasMany
     */
    public function services(): HasMany
    {
        return $this->HasMany(Service::class, 'capability_id');
    }
}

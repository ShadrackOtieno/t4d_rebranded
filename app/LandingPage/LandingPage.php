<?php

namespace App\LandingPage;

use App\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LandingPage extends Model
{
  use Sluggable;

  protected $fillable = ['subcategory_id', 'banner_description', 
  'description_title', 'catalog_file', 'description', 'slug'];

  /**
   * subcategory.
   *
   * @return BelongsTo
   */
  public function subcategory(){
    return $this->belongsTo(Subcategory::class);
  }
  
  /**
   * features.
   *
   * @return HasMany
   */
  public function features()
  {
      return $this->hasMany(Features::class);
  }

  /**
   * TESTIMONIALS.
   *
   * @return HasMany
   */
  public function testimonials()
  {
      return $this->hasMany(Testimonial::class);
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
              'source' => 'description_title'
          ]
      ];
  }
}

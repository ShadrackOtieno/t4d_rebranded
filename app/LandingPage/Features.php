<?php

namespace App\LandingPage;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $fillable = ['title', 'description', 'landing_page_id'];

    
  /**
   * landing page.
   *
   * @return BelongsTo
   */
  public function langing_page(){
    return $this->belongsTo(LandingPage::class);
  }
}

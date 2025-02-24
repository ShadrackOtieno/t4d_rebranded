<?php

namespace App;

use Storage;

trait CoverTrait
{
    /**
     * Cover image URL.
     * 
     * @param  string  $cover
     * @return string
     */
    public function coverUrl($cover)
    {
        return empty($cover) ? 
                asset('images/placeholder-image.png') : 
                Storage::url($cover);
    }
}
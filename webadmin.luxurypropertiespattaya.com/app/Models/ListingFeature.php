<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingFeature extends Model
{
    protected $table = 'listing_features';

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}

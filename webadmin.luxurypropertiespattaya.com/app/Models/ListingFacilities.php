<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingFacilities extends Model
{
    protected $table = 'listing_facilities';

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingLocation extends Model
{
    protected $table = 'locations';

    // protected $casts = [
    //     'extra' => 'json',
    // ];

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}

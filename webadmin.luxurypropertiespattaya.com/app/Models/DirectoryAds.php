<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectoryAds extends Model
{
    protected $table = 'directory_ads';

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}

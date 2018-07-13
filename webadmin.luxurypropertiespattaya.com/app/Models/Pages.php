<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}

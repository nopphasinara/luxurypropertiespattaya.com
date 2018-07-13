<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $table = 'demo';

    protected $casts = [
        'extra' => 'json',
    ];

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }

    public function setPicturesAttribute($pictures)
    {
      if (is_array($pictures)) {
        $this->attributes['pictures'] = json_encode($pictures);
      }
    }

    public function getPicturesAttribute($pictures)
    {
      return json_decode($pictures, true);
    }
}

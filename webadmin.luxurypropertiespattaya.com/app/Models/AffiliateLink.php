<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateLink extends Model
{
    protected $table = 'affiliate_links';

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $table = 'listings';

    public function setSlugAttribute($value)
    {
      if (!$value) $value = $this->attributes['name'];
      $this->attributes['slug'] = str_slug($value);
    }

    public function setGalleryAttribute($gallery)
    {
      if (is_array($gallery)) {
        $this->attributes['gallery'] = json_encode($gallery);
      }
    }

    public function getGalleryAttribute($gallery)
    {
      return json_decode($gallery, true);
    }
    
    public function setFeaturesAttribute($features)
    {
      if (is_array($features)) {
        $this->attributes['features'] = json_encode($features);
      }
    }

    public function getFeaturesAttribute($features)
    {
      return json_decode($features, true);
    }
    
    public function setFacilitiesAttribute($facilities)
    {
      if (is_array($facilities)) {
        $this->attributes['facilities'] = json_encode($facilities);
      }
    }

    public function getFacilitiesAttribute($facilities)
    {
      return json_decode($facilities, true);
    }
    
    public function getSalePriceAttribute($value)
    {
      return number_format($value, 0, '', '');
    }
    
    public function getRentPriceAttribute($value)
    {
      return number_format($value, 0, '', '');
    }
}

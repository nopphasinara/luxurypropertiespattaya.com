<?php

namespace App\Models\Listing;

use App\Models\Features\Features;
use App\Models\Facilities\Facilities;
use App\Models\Config\Config;
use App\Models\Listing\ListingType;
use App\Models\Location\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Listing extends Model
{

  protected $table = 'listings';
  protected $fillable = [];
  protected $perPage = 12;

  public static function byId($id)
  {
    return Listing::where('id', $id)->first();
  }

  public static function bySlug($slug)
  {
    return Listing::where('slug', $slug)->first();
  }

  public function randomKeywords($total = 10)
  {
    $keywords = [];

    if ($this->keywords) {
      $keywords = str_replace([
        ' , ',
        ' ,',
        ', ',
      ], ',', $this->keywords);
      $keywords = explode(',', $keywords, $total + 1);
      if (isset($keywords[$total])) unset($keywords[$total]);
    }

    $keywords = implode(', ', $keywords);

    return $keywords;
  }

  public function getRandomKeywordsAttribute()
  {
    return $this->randomKeywords();
  }

  public function getBedroomsAttribute() {
    return ($this->attributes['bedrooms']) ? $this->attributes['bedrooms'] : '';
  }

  public function getBathroomsAttribute() {
    return ($this->attributes['bathrooms']) ? $this->attributes['bathrooms'] : '';
  }

  public function getOwnershipAttribute() {
    if ($this->attributes['ownership']) {
      $ownership_id = $this->attributes['ownership'];
      $ownership = Config::byName('attribute_ownership');
      if ($ownership) {
        $ownership->value = json_decode($ownership->value, true);
      }

      return title_case($ownership->value[$ownership_id]);
    }
  }

  public function getFeaturesListAttribute()
  {
    $result = '';
    $value = json_decode($this->attributes['features'], true);

    if ($value) {
      $data = Features::whereIn('id', $value)->get();
      if ($data && $data->count()) {
        $result = $data;
      }
    }

    return $result;
  }

  public function getFacilitiesListAttribute()
  {
    $result = '';
    $value = json_decode($this->attributes['facilities'], true);

    if ($value) {
      $data = Facilities::whereIn('id', $value)->get();
      if ($data && $data->count()) {
        $result = $data;
      }
    }

    return $result;
  }

  public function getThumbnailAttribute()
  {
    $file = storage_exists('uploads',  'thumbnails/' . $this->attributes['image']);
    if (!$file) return placeholder();
    return $file['url'];
  }

  public function getGalleryAttribute($value)
  {
    if (substr($value, -3) == 'jpg') {
      $this->attributes['gallery'] = json_encode(['listings/' . $value]);
    }
    return json_decode($this->attributes['gallery'], true);
  }

  public function getVideoIdAttribute()
  {
    $url = $this->attributes['video'];
    $parse = parse_url($url);
    $host = (isset($parse['host'])) ? strtolower($parse['host']) : '';
    $query = [];
    $video_id = '';

    if (isset($parse['query'])) {
      $exp = explode('&', $parse['query']);
      foreach ($exp as $index => $value) {
        list($name, $val) = explode('=', $value);
        $query[$name] = $val;
      }
    }

    if (in_array($host, ['youtube.com', 'www.youtube.com'])) {
      $video_id = (isset($query['v'])) ? $query['v'] : '';
    } elseif (in_array($host, ['youtu.be', 'www.youtu.be'])) {
      $video_id = (isset($parse['path'])) ? trim($parse['path'], '/') : '';
    }

    return $video_id;
  }

  public function getSalePriceAttribute()
  {
    return number_format($this->attributes['sale_price'], 0, '.', ',');
  }

  public function getRentPriceAttribute()
  {
    return number_format($this->attributes['rent_price'], 0, '.', ',');
  }

  public function getPermalinkAttribute()
  {
    if (!$this->attributes['slug']) {
      $this->attributes['slug'] = str_slug($this->attributes['name']);
    }
    return url('property-details/' . $this->attributes['id'] . '/' . $this->attributes['slug']);
  }

  public function getListingTypeAttribute()
  {
    return ListingType::where('id', $this->attributes['listing_type_id'])->first();
  }

  public function getLocationAttribute()
  {
    return Location::where('id', $this->attributes['location_id'])->first();
  }

  public function scopeFeatured($query)
  {
    return $query->visible()->where('featured', 1);
  }

  public function scopeVisible($query)
  {
    return $query->where('web_visible', 1)->orderBy('id', 'desc');
  }

  public function scopeVisibleNoOrder($query)
  {
    return $query->where('web_visible', 1);
  }
}

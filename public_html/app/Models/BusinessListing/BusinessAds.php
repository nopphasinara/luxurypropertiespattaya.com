<?php

namespace App\Models\BusinessListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BusinessAds extends Model
{
  
  protected $table = 'directory_ads';
  protected $fillable = [];
  protected $perPage = 10;
  
  public static function byId($id)
  {
    return BusinessAds::where('id', $id)->first();
  }
  
  public static function bySlug($slug)
  {
    return BusinessAds::where('slug', $slug)->first();
  }
  
  public function category()
  {
    $result = '';
    $data = BusinessCategory::where('id', $this->attributes['category_id'])->first();
    if ($data) {
      $result = $data;
    }
    return $result;
  }
  
  public function getThumbnailAttribute()
  {
    $file = storage_exists('uploads', $this->attributes['image']);
    if (!$file) return placeholder();
    return $file['url'];
  }
  
  public function getPermalinkAttribute()
  {
    return ($this->attributes['url']) ? $this->attributes['url'] : '#';
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

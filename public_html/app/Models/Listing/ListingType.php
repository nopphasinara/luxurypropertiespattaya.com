<?php

namespace App\Models\Listing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ListingType extends Model
{
  
  protected $table = 'listing_types';
  protected $fillable = [];
  protected $singular = 'listing-category';
  protected $perPage = 10;
  
  public static function byId($id)
  {
    return ListingType::where('id', $id)->first();
  }
  
  public static function bySlug($slug)
  {
    return ListingType::where('slug', $slug)->first();
  }
  
  public function getThumbnailAttribute()
  {
    $file = storage_exists('uploads', $this->attributes['image']);
    if (!$file) return placeholder();
    return $file['url'];
  }
  
  public function getPermalinkAttribute()
  {
    return url($this->singular . '/' . $this->attributes['slug']);
  }
  
  public function scopeFeatured($query)
  {
    return $query->where('featured', 1);
  }
  
  public function scopeVisible($query)
  {
    return $query->where('web_visible', 1)->orderBy('name', 'asc');
  }
}

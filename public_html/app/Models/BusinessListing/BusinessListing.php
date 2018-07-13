<?php

namespace App\Models\BusinessListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BusinessListing extends Model
{
  
  protected $table = 'directories';
  protected $fillable = ['name', 'email', 'phone', 'website', 'image', 'message', 'web_visible', 'category_id'];
  protected $perPage = 10;
  
  public static function byId($id)
  {
    return BusinessListing::where('id', $id)->first();
  }
  
  public static function bySlug($slug)
  {
    return BusinessListing::where('slug', $slug)->first();
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
  
  public function scopeVisible($query)
  {
    return $query->where('web_visible', 1)->orderBy('id', 'desc');
  }
}

<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Location extends Model
{
  
  protected $table = 'locations';
  protected $fillable = [];
  protected $singular = 'location';
  protected $perPage = 10;
  
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
    return $query->where('web_visible', 1);
  }
  
  public function scopeOrderByNo($query, $options = [])
  {
    $options = array_merge([
      'column' => 'order_no',
      'sort' => 'asc',
    ], $options);
    
    return $query->orderBy($options['column'], $options['sort']);
  }
}

<?php

namespace App\Models\News;

use App\Models\News\NewsCategory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
  
  protected $table = 'news';
  protected $fillable = [];
  protected $perPage = 10;
  
  public static function byId($id)
  {
    return News::where('id', $id)->first();
  }
  
  public static function bySlug($slug)
  {
    return News::where('slug', $slug)->first();
  }
  
  public function getThumbnailAttribute()
  {
    $file = storage_exists('uploads', $this->attributes['image']);
    if (!$file) return placeholder();
    return $file['url'];
  }
  
  public function category()
  {
    $result = '';
    $data = NewsCategory::where('id', $this->attributes['category_id'])->first();
    if ($data) {
      $result = $data;
    }
    return $result;
  }
  
  public function getPermalinkAttribute()
  {
    return url('news/' . $this->attributes['id'] . '/' . $this->attributes['slug']);
  }
  
  public function getCreatedDateAttribute()
  {
    return date('d F Y', strtotime($this->attributes['created_at']));
  }
  
  public function getDescriptionAttribute()
  {
    $result = '';
    if ($this->attributes['description']) {
      $result = $this->attributes['description'];
    } else {
      $result = $this->attributes['content'];
      // $result = str_ireplace(['&nbsp;', '&#39;', '&quot;'], [' ', '\'', '"'], strip_tags($this->attributes['content']));
    }
    
    $result = clean_description($result);
    return $result;
  }
  
  public function scopeVisible($query)
  {
    return $query->where('web_visible', 1)->orderBy('id', 'desc');
  }
}

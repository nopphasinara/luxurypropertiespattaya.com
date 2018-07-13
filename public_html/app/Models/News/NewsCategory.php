<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewsCategory extends Model
{
  
  protected $table = 'news_categories';
  protected $fillable = [];
  protected $singular = 'news-category';
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
    return $query->where('web_visible', 1)->orderBy('name', 'asc');
  }
  
  public static function tree($tree = [], $html = '', $level = 0)
  {
    $style = ($level === 0) ? 'list-unstyled' : '';
    $html .= '<ul class="level-'. $level .' '. $style .' mb-0">';
    $level++;
    foreach ($tree as $key => $value) {
      if ($value->children) {
        $html .= '<li class="mb-0">';
        $html .= '<a href="'. $value->permalink .'">'. $value->name .'</a>';
        $html = NewsCategory::tree($value->children, $html, $level);
        $html .= '</li>';
      } else {
        $html .= '<li class="mb-0"><a href="'. $value->permalink .'">'. $value->name .'</a></li>';
      }
    }
    $html .= '</ul>';
    
    return $html;
  }
  
  public function getChildrenAttribute()
  {
    $id = $this->getKey();
    $children = NewsCategory::where('web_visible', 1)
                                ->where('parent_id', $id)
                                ->orderBy('order', 'asc')
                                ->get();
                                
    if ($children && $children->count()) return $children;
    return;
  }
}

<?php

namespace App\Models\BusinessListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BusinessCategory extends Model
{
  
  protected $table = 'directory_categories';
  protected $fillable = [];
  protected $singular = 'directory-category';
  
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
  
  public static function tree($tree = [], $html = '', $level = 0, $placement = '')
  {
    
    $level++;
    
    $dashed = '';
    for ($i = 0; $i < $level; $i++) {
      $dashed .= '&nbsp;&nbsp;';
    }
    
    if ($placement === 'form-add') {
      foreach ($tree as $key => $value) {
        if ($value->children) {
          $html .= '<option value="'. $value->id .'">'. $value->name .'</option>';
          $html = BusinessCategory::tree($value->children, $html, $level, $placement);
        } else {
          if ($level > 1) {
            $html .= '<option value="'. $value->id .'">'. $dashed .'- '. $value->name .'</option>';
          } else {
            $html .= '<option value="'. $value->id .'">'. $value->name .'</option>';
          }
        }
      }
    } else {
      $style = ($level === 0) ? 'list-unstyled' : '';
      $html .= '<ul class="level-'. $level .' '. $style .' mb-0">';
      foreach ($tree as $key => $value) {
        if ($value->children) {
          $html .= '<li class="mb-0">';
          $html .= '<a href="'. $value->permalink .'"><strong>'. $value->name .'</strong></a>';
          $html = BusinessCategory::tree($value->children, $html, $level, $placement);
          $html .= '</li>';
        } else {
          $menu_name = ($level < 2) ? '<strong>'. $value->name .'</strong>' : $value->name;
          $html .= '<li class="mb-0"><a href="'. $value->permalink .'">'. $menu_name .'</a></li>';
        }
      }
      $html .= '</ul>';
    }
    
    return $html;
  }
  
  public function getChildrenAttribute()
  {
    $id = $this->getKey();
    $children = BusinessCategory::where('web_visible', 1)
                                ->where('parent_id', $id)
                                ->orderBy('order', 'asc')
                                ->get();
                                
    if ($children && $children->count()) return $children;
    return;
  }
}

<?php

namespace App\Models\SiteMenu;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use App\Models\BusinessListing\BusinessCategory;

class SiteMenu extends Model
{
  
  protected $table = 'site_menus';
  protected $fillable = [];
  protected $singular = 'site-menu';
  protected $perPage = 10;
  
  protected $prepend;
  protected $append;
  
  public static function bySlug($slug)
  {
    if ($slug) return SiteMenu::where('slug', $slug)->first();
    return;
  }
  
  public function getPermalinkAttribute()
  {
    return url($this->singular . '/' . $this->attributes['slug']);
  }
  
  public function scopeVisible($query)
  {
    return $query->where('web_visible', 1)->orderBy('name', 'asc');
  }
  
  public static function renderMenuTree($tree)
  {
    $html = '';
    if ($tree) $html = SiteMenu::tree($tree, $html, 0);
    return $html;
  }
  
  public static function tree($tree = [], $html = '', $level = 0, $placement = '')
  {
    $pages = get_pagenames();
    
    $level++;
    foreach ($tree as $key => $value) {
      $prepend = '';
      $append = '';
      $page_active = '';
      
      if (isset($pages['pages'][$value->slug])) $page_active = $pages['pages'][$value->slug];
      
      if ($value->children) {
        if ($value->icon == '') {
          $value->icon = 'fa-caret-right';
          $value->icon_position = 'right';
        }
      }
      
      $icon = ($value->icon) ? ' <i class="fas fa-fw '. $value->icon .'">&nbsp;</i> ' : '';
      
      if ($value->slug === 'business-directory') {
        $icon = ' <i class="fas fa-fw fa-caret-down">&nbsp;</i> ';
        $value->icon_position = 'right';
      }
      
      if ($value->icon_position === 'right') { $append = $icon; } else { $prepend = $icon; }
      
      $menu_name = sprintf('%s' . $value->name . '%s', $prepend, $append);
      $menu_name = trim($menu_name);
      
      $drop = ($level > 1) ? 'showright' : 'showdown';
      
      if ($value->url) {
        $url = $value->url;
      } elseif ($value->permalink) {
        $url = $value->permalink;
      } else {
        $url = '';
      }
      
      $separate = '';
      if ($placement === 'footer-menu' && $key > 0) $separate = '<li class="list-inline-item">|</li>';
      
      if ($value->children || $value->slug === 'business-directory') {
        $tree = $value->children;
        if ($value->slug === 'business-directory') {
          $categories = BusinessCategory::where('web_visible', 1)->where('parent_id', 0)->orderBy('order', 'asc')->get();
          if ($categories) $tree = $categories;
          
          // foreach ($tree as $_key => $_value) {
          //   $_value->base = 'business-directory';
          //   $_value->url = $_value->permalink;
          //   $tree[$_key] = $_value;
          // }
        }
        
        if ($placement === 'footer-menu') {
          $html .= <<<EOT
$separate
<li class="list-inline-item menu-level-$level">
  <div class="subnav">
    <a href="$url" id="subnav-$value->id" data-toggle="subnav">$menu_name</a>
    <div class="subnav-menu $drop" aria-labelledby="#subnav-$value->id">
EOT;
          $html = SiteMenu::tree($tree, $html, $level, $placement);
          $html .= <<<EOT
    </div>
  </div>
</li>
EOT;
        } else {
          $html .= <<<EOT
<div class="nav-item menu-level-$level">
  <div class="subnav">
    <a class="nav-link" href="$url" id="subnav-$value->id" data-toggle="subnav">$menu_name</a>
    <div class="subnav-menu $drop" aria-labelledby="#subnav-$value->id">
EOT;
          $html = SiteMenu::tree($tree, $html, $level, $placement);
          $html .= <<<EOT
    </div>
  </div>
</div>
EOT;
        }
      } else {
        if ($placement === 'footer-menu') {
          $html .= <<<EOT
$separate
<li class="list-inline-item">
  <a href="$url" id="menu-$value->id">$menu_name</a>
</li>
EOT;
        } else {
          $html .= <<<EOT
<div class="nav-item">
  <a class="nav-link" href="$url" id="menu-$value->id">$menu_name</a>
</div>
EOT;
        }
      }
    }
    
    return $html;
  }
  
  public function getChildrenAttribute()
  {
    $id = $this->getKey();
    $children = SiteMenu::where('web_visible', 1)
                  ->where('parent_id', $id)
                  ->orderBy('order', 'asc')
                  ->get();
                  
    if ($children && $children->count()) return $children;
    return;
  }
}

<?php

namespace App\Models\SiteMenu;

use App\Models\SiteMenu\SiteMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteMenuController extends Controller
{
    
    protected $model;
    
    public function __construct()
    {
      $this->model = new SiteMenu;
    }
    
    public function byCategory($slug)
    {
      if (!$slug) return abort(404);
      
      $category = SiteMenu::where('web_visible', 1)->where('slug', $slug)->first();
      if (!$category) return abort(404);
      
      $categories = [
        $category->id,
      ];
      if ($category->children) {
        foreach ($category->children as $key => $value) {
          $categories[] = $value->id;
          if ($value->children) {
            foreach ($value->children as $_key => $_value) {
              $categories[] = $_value->id;
            }
          }
        }
      }
      
      return $this->index($category, $categories);
    }
}

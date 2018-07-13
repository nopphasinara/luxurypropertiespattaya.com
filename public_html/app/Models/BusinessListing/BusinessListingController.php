<?php

namespace App\Models\BusinessListing;

use App\Models\BusinessListing\BusinessListing;
use App\Models\BusinessListing\BusinessCategory as Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessListingController extends Controller
{
    
    protected $model;
    
    public function __construct()
    {
      $this->model = new BusinessListing;
      $this->category = new Category;
    }
    
    public function index()
    {
      $businessListings = BusinessListing::visible()->paginate();
      
      return view('business-directory')->with([
        'businessListings' => $businessListings,
      ]);
    }
    
    public function byCategory($slug)
    {
      if (!$slug) return abort(404);
      
      $category = BusinessCategory::visible()->where('slug', $slug)->first();
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
      
      $businessListings = BusinessListing::visible()->whereIn('category_id', $categories);
      $businessListings = $businessListings->paginate();
      
      return view('business-directory')->with([
        'businessListings' => $businessListings,
        'businessCategory' => $category,
      ]);
    }
}

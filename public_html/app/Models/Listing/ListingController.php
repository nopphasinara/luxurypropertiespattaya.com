<?php

namespace App\Models\Listing;

use App\Models\Location\Location;
use App\Models\Listing\Listing;
use App\Models\Features\Features;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    
    public function show($id = '', $slug = '')
    {
      $property = Listing::byId($id);
      if (!$property) return abort(404);
      
      return view('property-details', compact('property', 'id', 'slug'));
    }
    
    public function search()
    {
      $orderBy = request('order', 'created_at');
      $sort = request('sort', 'desc');
      
      if (strtolower($orderBy) == 'price') {
        $properties = Listing::orderBy('sale_price', $sort)->orderBy('rent_price', $sort);
      } else {
        $properties = Listing::orderBy($orderBy, $sort);
      }
      
      $keywords = request('s', '');
      if ($keywords) {
        $properties->where('name', 'like', '%'.$keywords.'%')
                   ->orWhere('description', 'like', '%'.$keywords.'%')
                   ->orWhere('refno', 'like', '%'.$keywords.'%')
                   ->orWhere('content', 'like', '%'.$keywords.'%');
      }
      
      $propertyType = request('propertyType', '');
      if ($propertyType) {
        $properties->where('listing_type_id', $propertyType);
      }
      
      $propertyFor = request('propertyFor', '');
      $propertyFor = strtolower($propertyFor);
      if ($propertyFor) {
        $properties->where('for_'. strtolower($propertyFor) .'', 1);
      }
      
      $location = request('location', '');
      if ($location) {
        $properties->where('location_id', $location);
      }
      
      $minBeds = request('minBeds', '');
      if ($minBeds) {
        $properties->where('bedrooms', '>=', $minBeds);
      }
      $maxBeds = request('maxBeds', '');
      if ($maxBeds) {
        $properties->where('bedrooms', '<=', $maxBeds);
      }
      
      $properties = $properties->where('web_visible', 1)->paginate();
      
      $randomKeywords = '';
      if ($properties && $properties->count()) {
        $randomProperty = $properties->shuffle()->first();
        if ($randomProperty) $randomKeywords = $randomProperty->randomKeywords;
      }
      
      return view('search', compact('properties'))->with([
        'keywords' => $keywords,
        'randomKeywords' => $randomKeywords,
      ]);
      
      return view('search', compact('properties'))->with([
        'keywords' => $keywords,
      ]);
    }
    
    public function byLocation($slug, $for = '', Request $request)
    {
      if (!$slug) return abort(404);
      
      $keywords = $request->get('s', '');
      
      $location = Location::where('web_visible', 1)->where('slug', $slug)->first();
      if (!$location) return abort(404);
      
      $orderBy = request('order', 'created_at');
      $sort = request('sort', 'desc');
      if (strtolower($orderBy) == 'price') {
        $properties = Listing::where('web_visible', 1)->where('location_id', $location->id)->orderBy('sale_price', $sort)->orderBy('rent_price', $sort);
      } else {
        $properties = Listing::where('web_visible', 1)->where('location_id', $location->id)->orderBy($orderBy, $sort);
      }
      
      // $properties = $properties->where('location_id', $location->id);
      if ($for) {
        $for = strtolower($for);
        $properties = $properties->where('for_'. $for .'', 1);
      }
      
      $properties = $properties->paginate();
      
      $randomKeywords = '';
      if ($properties && $properties->count()) {
        $randomProperty = $properties->shuffle()->first();
        if ($randomProperty) $randomKeywords = $randomProperty->randomKeywords;
      }
      
      return view('search', compact('properties'))->with([
        'keywords' => $keywords,
        'randomKeywords' => $randomKeywords,
      ]);
    }
}

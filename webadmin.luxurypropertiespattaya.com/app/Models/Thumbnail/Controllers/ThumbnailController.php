<?php

namespace App\Models\Thumbnail\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Listing;
use App\Models\ListingType;
use App\Models\DirectoryAds;
use App\Models\Directory;
use App\Models\AffiliateLink;
use App\Models\ListingLocation as Location;
use App\Models\News;
use Intervention\Image\ImageManager as Image;

class ThumbnailController extends Controller
{
    //
    public function generate()
    {
      ob_start();

      $collect = [];

      $data = Listing::get();
      if ($data && $data->count()) {
        foreach ($data as $key => $item) {
          if ($item->image) $collect[] = $item->image;
          if ($item->gallery) $collect = array_merge($collect, $item->gallery);
        }
      }

      $data = Location::get();
      if ($data && $data->count()) {
        foreach ($data as $key => $item) {
          if ($item->image) $collect[] = $item->image;
        }
      }

      $data = News::get();
      if ($data && $data->count()) {
        foreach ($data as $key => $item) {
          if ($item->image) $collect[] = $item->image;
        }
      }

      $data = ListingType::get();
      if ($data && $data->count()) {
        foreach ($data as $key => $item) {
          if ($item->image) $collect[] = $item->image;
        }
      }

      if ($collect) {
        foreach ($collect as $key => $image) {
          ob_start();

          if ($image) {
            $im = new Image;
            $im->make(public_path('uploads/' . $image))
               ->fit(300, null, function ($constraint) {
                 $constraint->upsize();
               })
               ->save(
                 public_path('uploads/thumbnails/' . $image),
                 80
               );

            echo "Resize..." . $image . "\n";
            ob_end_flush();
            ob_flush();
          }
        }
      }

      return view('debug')->with([
        'images' => $collect,
      ]);
    }
}

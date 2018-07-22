<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Listing;
use App\Models\BusinessListing\BusinessListing;
use App\Models\BusinessListing\BusinessCategory;
use App\Mail\ContactSent;
use App\Mail\BusinessAdded;
use App\Models\Pages\Pages;

use MercurySeries\Flashy\Flashy;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    //
    public function index($pagename = null) {
      $pagename = strtolower($pagename);
      if (!$pagename) $pagename = 'homepage';

      $segments = request()->segments();
      if (isset($segments[0]) && $segments[0] && count($segments) == 1) {
        $slug = $segments[0];
        $page = Pages::bySlug($slug);

        if ($page) {
          return view('page')->with([
            'page' => $page,
          ]);
        }
      }

      if (view()->exists($pagename)) return view($pagename);

      return abort(404);
    }

    public function sitemap()
    {
      $listings = \App\Models\Listing\Listing::all();
      $listingTypes = \App\Models\Listing\ListingType::all();
      $directoryCategories = \App\Models\BusinessListing\BusinessCategory::all();
      $news = \App\Models\News\News::all();
      $newsCategories = \App\Models\News\NewsCategory::all();

      $content = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
      $content .= "<urlset xmlns=\"https://www.sitemaps.org/schemas/sitemap/0.9\">\n";

      if ($listings->count()) {
        foreach ($listings as $key => $listing) {
          $content .= "<url>
          	<loc>". $listing->permalink ."</loc>
          	<lastmod>". date('Y-m-d', strtotime($listing->updated_at)) ."</lastmod>
          	<changefreq>monthly</changefreq>
          	<priority>0.9</priority>
          </url>\n";
        }
      }

      if ($listingTypes->count()) {
        foreach ($listingTypes as $key => $listingType) {
          $content .= "<url>
          	<loc>". $listingType->permalink ."</loc>
          	<lastmod>". date('Y-m-d', strtotime($listingType->updated_at)) ."</lastmod>
          	<changefreq>monthly</changefreq>
          	<priority>0.8</priority>
          </url>\n";
        }
      }

      if ($directoryCategories->count()) {
        foreach ($directoryCategories as $key => $directoryCategory) {
          $content .= "<url>
          	<loc>". $directoryCategory->permalink ."</loc>
          	<lastmod>". date('Y-m-d', strtotime($directoryCategory->updated_at)) ."</lastmod>
          	<changefreq>monthly</changefreq>
          	<priority>0.9</priority>
          </url>\n";
        }
      }

      if ($news->count()) {
        foreach ($news as $key => $newsItem) {
          $content .= "<url>
          	<loc>". $newsItem->permalink ."</loc>
          	<lastmod>". date('Y-m-d', strtotime($newsItem->updated_at)) ."</lastmod>
          	<changefreq>monthly</changefreq>
          	<priority>0.8</priority>
          </url>\n";
        }
      }

      if ($newsCategories->count()) {
        foreach ($newsCategories as $key => $newsCategory) {
          $content .= "<url>
          	<loc>". $newsCategory->permalink ."</loc>
          	<lastmod>". date('Y-m-d', strtotime($newsCategory->updated_at)) ."</lastmod>
          	<changefreq>monthly</changefreq>
          	<priority>0.7</priority>
          </url>\n";
        }
      }

      $content .= "</urlset>";

      ini_set('output_buffering', 'off');
      ini_set('zlib.output_compression', false);

      ini_set('implicit_flush', true);
      ob_implicit_flush(true);

      header("Content-type: application/xml");
      header('Cache-Control: no-cache');

      echo $content;
    }

    /**
     * Show properties associated with the location.
     *
     * @return App\Listing
     */
    public function byLocation($location, $for = null) {
      if ($for == 'sale') {
        $properties = Listing::forSale($location);
      } elseif ($for == 'rent') {
        $properties = Listing::forRent($location);
      } else {
        $properties = Listing::byLocation($location);
      }
      return view('by-location', compact('properties', 'location', 'for'));
    }

    /**
     * Show all visible properties.
     *
     * @return App\Listing
     */
    public function searchResults() {
      $properties = Listing::visible();
      return view('search', compact('properties'));
    }

    /**
     * Show news details.
     *
     * @return void
     */
    public function newsDetails(Int $id, String $slug) {
      $news = '';
      return view('news-details', compact('news'));
    }

    public function contactUsSubmit(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:80',
        'email' => 'required|email|max:80',
        'phone' => 'required_without:email|alpha_dash|nullable',
        'subject' => 'required|max:150',
        'message' => 'nullable',
      ]);

      if ($validator->fails()) return back()->withErrors($validator)->withInput();

      $message = new ContactSent($request->all());
      // echo $message->render();

      // Mail::to(['goldfishcreative.thailand@gmail.com'])->send($message);
      Mail::to(config('custom.notification_contact_to'))->bcc('goldfishcreative.thailand@gmail.com')->send($message);

      flash()->overlay('<p class="lead pb-2 text-center text-success">You message has been sent,<br>thank you.</p><div class="px-3"><div class="btn btn-success btn-block btn-sm mb-3" data-dismiss="modal">Close</div></div>', '<h3 class="mt-4 mb-0 text-success text-center w-100"><p class="mb-3"><i class="far fa-5x fa-check-circle"></i></p><p class="mb-1">Success!</p></h3>', ['success']);

      return redirect()->back();
    }

    public function BusinessAddSubmit(Request $request)
    {
      $request['image_path'] = '';
      if ($request->hasFile('image')) {
        $request['image_path'] = $request->file('image')->store('directory', 'uploads');
      }

      $validator = Validator::make($request->all(), [
        'name' => 'required|max:80',
        'email' => 'required|email|max:80',
        'phone' => 'required_without:email|alpha_dash|nullable',
        'website' => 'nullable|url',
        'image' => 'nullable',
        'category_id' => 'required',
      ]);

      if ($validator->fails()) return back()->withErrors($validator)->withInput();

      $created_id = BusinessListing::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'website' => $request->website,
        'image' => $request['image_path'],
        'message' => $request->message,
        'category_id' => $request->category_id,
        'web_visible' => 0,
      ])->id;

      $request['created_id'] = $created_id;
      $category = BusinessCategory::where('id', $request->category_id)->first();
      $request['category_name'] = ($category) ? $category->name : '';

      $message = new BusinessAdded($request->all());
      // echo $message->render();

      // Mail::to(['goldfishcreative.thailand@gmail.com'])->send($message);
      Mail::to(config('custom.notification_contact_to'))->bcc('goldfishcreative.thailand@gmail.com')->send($message);

      flash()->overlay('<p class="lead pb-2 text-center text-success">Your details has been sent,<br>thank you.</p><div class="px-3"><div class="btn btn-success btn-block btn-sm mb-3" data-dismiss="modal">Close</div></div>', '<h3 class="mt-4 mb-0 text-success text-center w-100"><p class="mb-3"><i class="far fa-5x fa-check-circle"></i></p><p class="mb-1">Success!</p></h3>', ['success']);

      return redirect()->back();
    }
}

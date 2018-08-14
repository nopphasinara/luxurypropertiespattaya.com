<?php

use App\Models\SiteMenu\SiteMenu;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', 'HomepageController@index')->name('homepage');

Route::get('/agent/{slug}', 'PageController@agentBySlug')->name('page.agent')->where([
  'slug' => '[a-zA-Z0-9\-\_\.]+',
]);

Route::get('/agent/{slug}/listing/{listing_slug}', 'PageController@agentListingBySlug')->name('page.agent.listing')->where([
  'slug' => '[a-zA-Z0-9\-\_\.]+',
  'listing_slug' => '[a-zA-Z0-9\-\_\.]+',
]);


Route::get('sitemap', 'PageController@sitemap')->name('sitemap');

Route::get('radio-banner', function () {
  return view('radio-banner');
});
Route::get('radio-{status}', function ($status = '') {
  if ($status === 'played') {
    // setcookie('is_radio_played', '', time() - 3600, '/');
    setcookie('is_radio_played', 1, 0, '/');
  }

  if ($status === 'pause') {
    // setcookie('is_radio_played', '', time() - 3600, '/');
    setcookie('is_radio_played', 0, 0, '/');
  }

  return json_encode([
    'status' => $status,
  ]);
})->name('radio.set-status')->where([
  'status' => '[a-zA-Z\-]+',
]);

Route::get('welcome', 'PageController@demo')->name('demo.welcome');
// Route::get('welcome', function () {
//   $input = [];
//
//   $menuTree = '';
//   $menu = SiteMenu::where('slug', 'main-menu')->first();
//   if ($menu) {
//     if ($menu->children) {
//       $menuTree = SiteMenu::renderMenuTree($menu->children);
//     }
//   }
//
//   $input['menu'] = $menu;
//   $input['menuTree'] = $menuTree;
//   return view('welcome')->with([
//     'input' => $input,
//   ]);
// });


// Search
Route::get('search', '\App\Models\Listing\ListingController@search')->name('search');

// Contact
Route::post('contact-us-submit', 'PageController@contactUsSubmit')->name('contact-us-submit');
Route::get('email-newsletter', 'PageController@emailNewsletter')->name('email-newsletter');


// Business Listing
Route::post('business-add-submit', 'PageController@businessAddSubmit')->name('business-add-submit');
Route::get('directory-category/{slug}', '\App\Models\BusinessListing\BusinessListingController@byCategory')->where([
  'slug' => '[0-9a-zA-Z\-\_\.]+',
])->name('directory-category');
Route::get('business-directory', '\App\Models\BusinessListing\BusinessListingController@index');


// News
Route::get('news-category/{slug}', '\App\Models\News\NewsController@byCategory')->where([
  'slug' => '[0-9a-zA-Z\-\_\.]+',
]);
Route::get('demo-news-and-information', '\App\Models\News\NewsController@indexDemo');
Route::get('news-and-information', '\App\Models\News\NewsController@index');
Route::get('news/{id}/{slug}', '\App\Models\News\NewsController@show')->where([
  'id' => '[0-9]+',
  'slug' => '[0-9a-zA-Z\-\_\.]+',
]);


// Listings
Route::get('properties-in-{location}-for-{for}', '\App\Models\Listing\ListingController@byLocation')->where([
  'location' => '[0-9a-zA-Z\-\_\.]+',
  'for' => '[0-9a-zA-Z\-\_\.]+',
]);

Route::get('properties-in-{location}', '\App\Models\Listing\ListingController@byLocation')->where([
  'location' => '[0-9a-zA-Z\-\_\.]+',
]);

Route::get('property-details/{id}/{slug}', '\App\Models\Listing\ListingController@show')->where([
  'id' => '[0-9]+',
  'slug' => '[0-9a-zA-Z\-\_\.]+',
]);

Route::get('listing-category/{category}', '\App\Models\Listing\ListingController@byCategory')->where([
  'category' => '[0-9a-zA-Z\-\_\.]+',
]);


// Pages
Route::prefix('/')->group(function () {
  Route::get('{pagename}', 'PageController@index');
});


Route::get('/mailable', function () {
    return new App\Mail\ContactSent(request()->all());
});

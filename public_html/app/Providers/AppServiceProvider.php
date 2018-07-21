<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

use App\Models\SiteMenu\SiteMenu;
use App\Models\Listing\Listing;
use App\Models\Listing\ListingType;
use App\Models\Location\Location;
use App\Models\News\News;
use App\Models\News\NewsCategory;
use App\Models\BusinessListing\BusinessAds;
use App\Models\BusinessListing\BusinessCategory;
use App\Models\Testimonial\Testimonial;
use App\Models\Config\Config as CustomConfig;
use App\Models\Affiliate\Affiliate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Set default pagination view template
        Paginator::defaultView('partials.pagination');

        Affiliate::track();

        $data = CustomConfig::get();
        if ($data) {
          $customConfig = [];
          foreach ($data as $index => $value) {
            $customConfig[$value->name] = $value->value;
          }
          $office_address = (isset($customConfig['office_address']) && $customConfig['office_address']) ? json_decode($customConfig['office_address'], true) : [];
          $customConfig['address'] = $office_address;
          $customConfig['office_address'] = implode(', ', $office_address);
          $customConfig['office_location'] = explode(',', str_replace([' , ', ' ,', ', '], ',', $customConfig['office_location']));
          $customConfig['lat'] = $customConfig['office_location'][0];
          $customConfig['lng'] = $customConfig['office_location'][1];
          $customConfig['twitter_reply_to'] = str_ireplace('https://twitter.com/', '', $customConfig['twitter']);
          $customConfig['linkedin_source'] = studly_case($customConfig['site_name']);
          $notification_contact_to = array_get($customConfig, 'notification_contact_to');
          if ($notification_contact_to) {
            $notification_contact_to = explode(',', str_replace(' ', '', $notification_contact_to));
            $customConfig['notification_contact_to'] = $notification_contact_to;
          }
          config([
            'custom' => $customConfig,
          ]);
        }

        view()->composer('partials.header.navbar-main', function ($view) {
          $menuTree = '';
          $menu = SiteMenu::bySlug('main-menu');
          if ($menu->children) $menuTree = SiteMenu::tree($menu->children, $menuTree, 0);

          $view->with([
            'menu' => $menu,
            'menuTree' => $menuTree,
          ]);
        });

        view()->composer('partials.footer.footer', function ($view) {
          $menuTree = '';
          $menu = SiteMenu::bySlug('footer-menu');
          if ($menu->children) $menuTree = SiteMenu::tree($menu->children, $menuTree, 0, 'footer-menu');

          $view->with([
            'menu' => $menu,
            'menuTree' => $menuTree,
          ]);
        });

        view()->composer('*', function ($view) {
          $mixed = [
            'is_home' => false,
            'is_inner' => false,
          ];
          $body_class = [
            'page',
          ];
          $segments = request()->segments();
          $pagename = (isset($segments[0]) && $segments[0]) ? str_slug($segments[0]) : 'homepage';
          if ($pagename == 'homepage') {
            $body_class[] = 'homepage';
            $mixed['is_home'] = true;
          } else {
            $body_class[] = 'page-inner';
            $mixed['is_inner'] = true;
          }

          $base_route = (request()->segment(1) === '/') ? 'homepage' : request()->segment(1);

          $mixed['base_route'] = $base_route;
          $mixed['pagename'] = $pagename;
          $mixed['body_class'] = $body_class;

          $view->with([
            'pagename' => $pagename,
            'body_class' => implode(' ', $body_class),
            'mixed' => $mixed,
          ]);
        });

        view()->composer('partials.header.navbar-main', function ($view) {
            // $segments = request()->segments();
            // if (isset($segments[0]) && $segments[0]) {
            //   $pagename = $segments[0];
            // } else {
            //   $pagename = 'homepage';
            // }
            //
            // $pages = [
            //   'homepage'             => '',
            //   'for-sale'             => '',
            //   'for-rent'             => '',
            //   'business-directory'   => '',
            //   'news-and-information' => '',
            //   'about-us'             => '',
            //   'contact-us'           => '',
            // ];
            //
            // $pages[$pagename] = 'active';

            $view->with(get_pagenames());
        });

        view()->composer([
          'components/featured-properties',
          'partials.homepage.featured-properties-new',
        ], function ($view) {
          $featuredProperties = Listing::featured()->take(10)->get();
          $featuredAds = BusinessAds::visibleNoOrder()->where('search_visible', 1)->get();
          if ($featuredAds && $featuredAds->count()) {
            $featuredAds = $featuredAds->shuffle();
            $featuredAds = $featuredAds[0];
          }

          $view->with([
            'featuredProperties' => $featuredProperties,
            'featuredAds' => $featuredAds,
          ]);
        });

        view()->composer([
          'partials.header.navbar-main',
          'partials.homepage.popular-locations',
        ], function ($view) {
          $locations = Location::featured()->orderByNo()->get();

          $view->with([
            'locations' => $locations,
          ]);
        });

        view()->composer([
          'components.news-categories',
        ], function ($view) {
          $categoriesTree = '';
          $categories = NewsCategory::where('web_visible', 1)->where('parent_id', 0)->orderBy('order', 'asc')->get();
          if ($categories) $categoriesTree = NewsCategory::tree($categories, $categoriesTree, 0);

          // $newsCategories = NewsCategory::visible()->get();

          $view->with([
            'categoriesTree' => $categoriesTree,
          ]);
        });

        view()->composer([
          'components.business-categories',
        ], function ($view) {
          $categoriesTree = '';
          $categories = BusinessCategory::where('web_visible', 1)->where('parent_id', 0)->orderBy('order', 'asc')->get();
          if ($categories) $categoriesTree = BusinessCategory::tree($categories, $categoriesTree, 0);

          // $businessCategories = BusinessCategory::visible()->get();

          $view->with([
            'categoriesTree' => $categoriesTree,
          ]);
        });

        view()->composer([
          'components.recent-news',
        ], function ($view) {
          $recentNews = News::visible()->take(10)->get();

          $view->with([
            'recentNews' => $recentNews,
          ]);
        });

        view()->composer([
          'components.business-add',
        ], function ($view) {
          $categoriesTree = '';
          $categories = BusinessCategory::where('web_visible', 1)->where('parent_id', 0)->orderBy('order', 'asc')->get();
          if ($categories) $categoriesTree = BusinessCategory::tree($categories, $categoriesTree, 0, 'form-add');

          $view->with([
            'categoriesTree' => $categoriesTree,
          ]);
        });

        view()->composer([
          'components.business-ads',
        ], function ($view) {
          $data = BusinessAds::where('web_visible', 1)->orderBy('featured', 1);
          if (request()->routeIs('directory-category')) {
            $slug = request()->segments()[1];
            $category = BusinessCategory::where('web_visible', 1)->where('slug', $slug)->first();
            if ($category) {
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

              $data = BusinessAds::where('web_visible', 1)->whereIn('category_id', $categories)->orWhere('category_id', NULL);
            }
          }
          $data = $data->get();
          $data = $data->shuffle();
          $featuredAds = [];
          $ads = [];

          foreach ($data as $key => $value) {
            if ($value->featured === 1) $featuredAds[] = $value;
            if ($value->featured !== 1) $ads[] = $value;
          }

          $view->with([
            'featuredAds' => $featuredAds,
            'ads' => $ads,
          ]);
        });

        view()->composer([
          'components.search-toolbar',
        ], function ($view) {
          $locations = Location::visible()->orderByNo()->get();
          $propertyTypes = ListingType::visible()->get();

          $view->with([
            'propertyTypes' => $propertyTypes,
            'locations' => $locations,
          ]);
        });

        view()->composer([
          'partials.homepage.slide',
        ], function ($view) {
          $searchTags = config('custom.homepage_search_tags');

          $view->with([
            'searchTags' => json_decode($searchTags, true),
          ]);
        });

        view()->composer([
          'partials.homepage.clients',
        ], function ($view) {
          $data = Testimonial::visible()->featured()->get();

          $view->with([
            'testimonials' => $data->take(3),
          ]);
        });

        view()->composer([
          'partials.footer.contact-info',
        ], function ($view) {
          $office_location = config('custom.office_location');
          list($lat, $lng) = $office_location;
          $address = config('custom.office_location');

          $view->with([
            'lat' => $lat,
            'lng' => $lng,
            'address' => $address,
          ]);
        });

        view()->composer([
          'partials.pagination',
          'search',
        ], function ($view) {
          $currentPath = request()->path();
          $page = request('page', 1);
          $searchQuery = request()->query();
          $searchQuery['page'] = $page;

          $view->with([
            'searchQuery' => $searchQuery,
            'currentPath' => $currentPath,
          ]);
        });

        // view()->composer(['components/featured-properties', 'partials.homepage.featured-properties-new'], function ($view) {
        //   $featured_properties = Listing::featured();
        //   $view->with([
        //     'featured_properties' => $featured_properties,
        //   ]);
        // });
        //
        // view()->composer('partials.homepage.popular-locations', function ($view) {
        //   $locations = Location::orderBy('order_no', 'ASC')->get();
        //
        //   $view->with([
        //     'locations' => $locations,
        //   ]);
        // });

        // view()->composer('partials.header.navbar-main', function($view) {
        //   $locations = Location::all();
        //
        //   $segments = request()->segments();
        //   if (isset($segments[0]) && $segments[0]) {
        //     $pagename = $segments[0];
        //   } else {
        //     $pagename = 'homepage';
        //   }
        //
        //   $pages = [
        //     'homepage'             => '',
        //     'for-sale'             => '',
        //     'for-rent'             => '',
        //     'business-directory'   => '',
        //     'news-and-information' => '',
        //     'about-us'             => '',
        //     'contact-us'           => '',
        //   ];
        //
        //   $pages[$pagename] = 'active';
        //
        //   $view->with([
        //     'pagename' => $pagename,
        //     'pages' => $pages,
        //     'locations' => $locations,
        //   ]);
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require(__DIR__ . '/../Http/Helpers.php');
    }
}

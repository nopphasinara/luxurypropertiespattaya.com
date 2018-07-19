<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->post('listing-types/update-order', 'ListingTypeController@bootUpdateOrder');
    $router->post('news-categories/update-order', 'NewsCategoryController@bootUpdateOrder');
    $router->post('directory-categories/update-order', 'DirectoryCategoryController@bootUpdateOrder');
    $router->post('categories/update-order', 'CategoryController@bootUpdateOrder');
    $router->post('site-menus/update-order', 'SiteMenuController@bootUpdateOrder');
    $router->resource('site-menus', SiteMenuController::class);
    $router->resource('listing-types', ListingTypeController::class);
    $router->resource('locations', ListingLocationController::class);
    $router->resource('listings', ListingController::class);
    $router->resource('listing-features', ListingFeatureController::class);
    $router->resource('listing-facilities', ListingFacilitiesController::class);
    $router->resource('news', NewsController::class);
    $router->resource('news-categories', NewsCategoryController::class);
    $router->resource('directories', DirectoryController::class);
    $router->resource('directory-categories', DirectoryCategoryController::class);
    $router->resource('directory-ads', DirectoryAdsController::class);
    $router->resource('testimonials', TestimonialController::class);
    $router->resource('pages', PagesController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('affiliate-links', AffiliateLinkController::class);
    $router->get('site-settings', 'SiteSettingController@show');
});

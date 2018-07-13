<?php

use Faker\Generator as Faker;
use App\Models\Listing\Listing;

$factory->define(Listing::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence,
      'slug' => $faker->slug,
      'description' => $faker->paragraph(1, true),
      'content' => $faker->paragraph(10),
      'listing_type_id' => rand(1, 4),
      'location_id' => rand(1, 4),
      'for_sale' => rand(0, 1),
      'for_rent' => rand(0, 1),
      'sale_price' => $faker->randomFloat(2, 100000),
      'rent_price' => $faker->randomFloat(2, 100000),
      'features' => rand(1, 4),
      'facilities' => rand(1, 4),
      'image' => $faker->image($dir = public_path('uploads/listings'), $width = 640, $height = 480, $category = 'city', $fullPath = false, $randomize = true, $word = null),
      'gallery' => $faker->image($dir = public_path('uploads/listings'), $width = 640, $height = 480, $category = 'city', $fullPath = false, $randomize = true, $word = null),
      'featured' => rand(0, 1),
      'web_visible' => rand(0, 1),
    ];
});

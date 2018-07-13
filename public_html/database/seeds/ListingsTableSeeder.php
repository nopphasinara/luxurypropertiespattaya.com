<?php

use Illuminate\Database\Seeder;
use App\Models\Listing\Listing;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // factory(Listing::class, 30)->create();
      
      $listings = Listing::get();
      foreach ($listings as $index => $listing) {
        // $features = '["'. $listing->features .'"]';
        if (!is_array(json_decode($listing->features, true))) {
          $listing->features = json_encode([$listing->features]);
        }
        $listing->features = json_encode(json_decode($listing->features, true));
        // $facilities = '["'. $listing->facilities .'"]';
        if (!is_array(json_decode($listing->facilities, true))) {
          $listing->facilities = json_encode([$listing->facilities]);
        }
        $listing->facilities = json_encode(json_decode($listing->facilities, true));
        // $gallery = $listing->gallery;
        // $listing->gallery = json_encode($gallery);
        $listing->update();
      }
    }
}

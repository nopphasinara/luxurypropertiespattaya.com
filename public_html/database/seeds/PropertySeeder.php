<?php

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared(file_get_contents(__DIR__ . '/sql/properties.sql'));
        
        $properties = App\Property::all();
        foreach ($properties as $key => $property) {
          $slug = str_slug($property->name);
          
          $id_exists = App\Property::where('slug', $slug)->first();
          if ($id_exists) {
            $slug .= '-' . $property->id;
          }
          
          $property->slug = $slug;
          $property->save();
        }
    }
}

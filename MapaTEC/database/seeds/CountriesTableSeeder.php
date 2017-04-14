<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('countries')->insert([
        'name' => 'México'
      ]);
      DB::table('states')->insert([
        'name' => 'United States'
      ]);

      //Seeds para tablas cruce
      DB::table('location_has_country')->insert([
        'location_id' => 1,
        'country_id' => 1,
      ]);
    }
}

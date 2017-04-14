<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cities')->insert([
        'name' => 'Puebla'
      ]);
      DB::table('cities')->insert([
        'name' => 'Cholula'
      ]);
      DB::table('cities')->insert([
        'name' => 'Atlixco'
      ]);
      DB::table('cities')->insert([
        'name' => 'Monterrey'
      ]);

      //Seeds para tablas cruce
      DB::table('location_has_city')->insert([
        'location_id' => 1,
        'city_id' => 1,
      ]);
    }
}

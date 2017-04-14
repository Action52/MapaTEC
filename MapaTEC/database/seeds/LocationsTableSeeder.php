<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('locations')->insert([
        'description' => 'Punto en la coordenada X,X'
      ]);
      DB::table('locations')->insert([
        'description' => 'Linea en las coordenadas X,X,X'
      ]);
      DB::table('locations')->insert([
        'description' => 'Proyecto ubicado en la Ciudad de México'
      ]);
      DB::table('locations')->insert([
        'description' => 'Proyecto desarrollándose en la Reserva Territorial Atlixcáyotl.'
      ]);

      //Seeds para tablas cruce
      DB::table('project_has_location')->insert([
        'project_id' => 1,
        'location_id' => 1,
      ]);
    }
}

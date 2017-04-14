<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //The insertion will be raw since this table contains geospatial data
      DB::insert("INSERT INTO areas (name, geom)
        VALUES (
          'Poligono',
          ST_GeomFromText('POLYGON((27.43 -5.09, 34.52 21.34, 1 0,27.43 -5.09))',4326) )
      ");

      //Seeds para tablas cruce
      DB::table('location_has_area')->insert([
        'location_id' => 1,
        'area_id' => 1,
      ]);
    }
}

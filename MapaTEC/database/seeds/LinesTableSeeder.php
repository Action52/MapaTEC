<?php

use Illuminate\Database\Seeder;

class LinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //The insertion will be raw since this table contains geospatial data
      DB::insert("INSERT INTO lines (name, geom)
        VALUES (
          'Linea en 27.43 -5.09, 34.52 21.34',
          ST_GeomFromText('LINESTRING(27.43 -5.09, 34.52 21.34)',4326) )
      ");
      DB::insert("INSERT INTO lines (name, geom)
        VALUES (
          'Linea en 52.78 -21.09, 35.52 21.24',
          ST_GeomFromText('LINESTRING(52.78 -21.09, 35.52 21.24)',4326) )
      ");

      //Seeds para tablas cruce
      DB::table('location_has_line')->insert([
        'location_id' => 1,
        'line_id' => 1,
      ]);

      
    }
}

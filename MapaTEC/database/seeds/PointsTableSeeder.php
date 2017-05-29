<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //The insertion will be raw since this table contains geospatial data
      DB::insert("INSERT INTO points (name, geom)
        VALUES (
          'Punto',
          ST_GeomFromText('POINT(27.43 -5.09)',4326) )
      ");
      DB::insert("INSERT INTO points (name, geom)
        VALUES (
          'Punto',
          ST_GeomFromText('POINT(1 0)',4326) )
      ");
      DB::insert("INSERT INTO points (name, geom)
        VALUES (
          'Punto',
          ST_GeomFromText('POINT(5.067 -3.45)',4326) )
      ");
      //Seeds para tablas cruce
      DB::table('location_has_point')->insert([
        'location_id' => 1,
        'point_id' => 1,
      ]);
      DB::table('location_has_point')->insert([
        'location_id' => 1,
        'point_id' => 2,
      ]);
    }
}

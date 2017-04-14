<?php

use Illuminate\Database\Seeder;

class CampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //The insertion will be raw since this table contains geospatial data
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Puebla',
          ST_GeomFromText('POINT(27.43 -5.09)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Santa Fe',
          ST_GeomFromText('POINT(14.39 -16.40)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Toluca',
          ST_GeomFromText('POINT(69.99 1.02)',4326) )
      ");
    }
}

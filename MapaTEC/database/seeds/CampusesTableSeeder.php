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
          ST_GeomFromText('POINT(19.02199 -98.2377051)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Santa Fe',
          ST_GeomFromText('POINT(19.3593887 -99.2626476)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Toluca',
          ST_GeomFromText('POINT(19.2687639 -99.7100848)',4326) )
      ");
    }
}

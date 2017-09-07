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
          'Aguascalientes',
          ST_GeomFromText('POINT(21.9336544 -102.3402385)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Central de Veracruz',
          ST_GeomFromText('POINT(18.8909329 -96.9789411)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Chiapas',
          ST_GeomFromText('POINT(16.7648513 -93.200972)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Chihuahua',
          ST_GeomFromText('POINT(28.675378 -106.0812614)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Ciudad de México',
          ST_GeomFromText('POINT(19.283289 -99.1351755)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Ciudad Juárez',
          ST_GeomFromText('POINT(31.7155143 -106.3942195)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Ciudad Obregón',
          ST_GeomFromText('POINT(27.5322033 -109.9452802)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Cuernavaca',
          ST_GeomFromText('POINT(18.8057127 -99.2214795)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Estado de México',
          ST_GeomFromText('POINT(19.5952474 -99.2277616)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Guadalajara',
          ST_GeomFromText('POINT(20.7348735 -103.4550378)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Hidalgo',
          ST_GeomFromText('POINT(20.0958883 -98.765924)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Irapuato',
          ST_GeomFromText('POINT(20.686692 -101.3946832)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Laguna',
          ST_GeomFromText('POINT(25.5172724 -103.3976516)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'León',
          ST_GeomFromText('POINT(21.166139 -101.715728)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Monterrey',
          ST_GeomFromText('POINT(25.6515393 -100.2895148)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Morelia',
          ST_GeomFromText('POINT(19.6564294 -101.1639437)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Puebla',
          ST_GeomFromText('POINT(19.0182502 -98.2413352)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Querétaro',
          ST_GeomFromText('POINT(20.6133127 -100.4052985)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Saltillo',
          ST_GeomFromText('POINT(25.4481991 -100.975182)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'San Luis Potosí',
          ST_GeomFromText('POINT(22.1272152 -101.0384351)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Santa Fe',
          ST_GeomFromText('POINT(19.3597214 -99.2580185)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Sinaloa',
          ST_GeomFromText('POINT(24.8014125 -107.4213886)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Sonora Norte',
          ST_GeomFromText('POINT(29.1695871 -110.9112209)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Tampico',
          ST_GeomFromText('POINT(22.3809927 -97.9019639)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Toluca',
          ST_GeomFromText('POINT(19.2686852 -99.7078742)',4326) )
      ");
      DB::insert("INSERT INTO campuses (name, geom)
        VALUES (
          'Zacatecas',
          ST_GeomFromText('POINT(22.762694 -102.5346092)',4326) )
      ");
    }
}

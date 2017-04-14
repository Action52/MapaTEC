<?php

use Illuminate\Database\Seeder;

class StrategicPartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //The insertion will be raw since this table contains geospatial data
        DB::insert("INSERT INTO strategicpartners (name, email, private_or_public, moral_or_physical, geom)
          VALUES (
            'COCA-COLA',
            'atencion@cocacola.mx',
            true,
            true,
            ST_GeomFromText('POINT(1 1)',4326) )
        ");
    }
}

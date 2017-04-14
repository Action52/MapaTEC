<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'name' => 'Arquitectura'
      ]);
      DB::table('categories')->insert([
        'name' => 'Mecánica'
      ]);
      DB::table('categories')->insert([
        'name' => 'Programación'
      ]);
      DB::table('categories')->insert([
        'name' => 'Deportes'
      ]);
      DB::table('categories')->insert([
        'name' => 'Derecho'
      ]);
    }
}

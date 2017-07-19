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


      DB::table('user_has_category')->insert([
        'user_id' => 1,
        'category_id' => 1,
      ]);

      DB::table('user_has_category')->insert([
        'user_id' => 1,
        'category_id' => 2,
      ]);

      DB::table('user_has_category')->insert([
        'user_id' => 2,
        'category_id' => 3,
      ]);

      DB::table('user_has_category')->insert([
        'user_id' => 2,
        'category_id' => 1,
      ]);

      DB::table('user_has_category')->insert([
        'user_id' => 2,
        'category_id' => 4,
      ]);
    }
}

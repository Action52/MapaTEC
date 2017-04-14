<?php

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('times')->insert([
        'sem_start' => 'EM',
        'year_start' => '16',
        'sem_end' => 'EM',
        'year_end' => '17'
      ]);
      DB::table('times')->insert([
        'sem_start' => 'AD',
        'year_start' => '15',
        'sem_end' => 'V',
        'year_end' => '16'
      ]);
      DB::table('times')->insert([
        'sem_start' => 'AD',
        'year_start' => '15',
        'sem_end' => 'EM',
        'year_end' => '16'
      ]);
    }
}

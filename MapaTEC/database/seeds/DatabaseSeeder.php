<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StrategicPartnersTableSeeder::class);
        $this->call(CampusesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(LinesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(PointsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(MajorsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);

    }
}

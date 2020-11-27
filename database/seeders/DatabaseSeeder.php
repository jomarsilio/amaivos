<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\ExpertiseArea::factory(10)->create();
        \App\Models\WeekDay::factory(7)->create();
        \App\Models\City::factory(50)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Service::factory(5)->create();
        \App\Models\Animal::factory(5)->create();
        \App\Models\Testimonial::factory(20)->create();
    }
}

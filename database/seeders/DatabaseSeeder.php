<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            CountrySeeder::class,
            InBoxSeeder::class,
            LocationSeeder::class,
        ]);

        \App\Models\User::factory(500)->create();
        \App\Models\Product::factory(1000)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            'USA',
            'Turkey',
            'China',
            'Japan',
            'Canada',
            'Russia',
        ];

        foreach ($countries as $country) {
            $el = new Country();
            $el->name = $country;
            $el->save();
        }
    }
}

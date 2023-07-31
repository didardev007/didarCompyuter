<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            'Ashgabat',
            'Ahal',
            'Balkan',
            'Mary',
            'Dashoguz',
            'Lebap',
        ];

        foreach ($locations as $location) {
            $el = new Location();
            $el->name = $location;
            $el->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            'White',
            'Black',
            'Green',
            'Gray',
            'Blue',
            'Red',
        ];

        foreach ($colors as $color) {
            $el = new Color();
            $el->name = $color;
            $el->save();
        }
    }
}

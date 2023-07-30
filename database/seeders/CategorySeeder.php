<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categoryes = [
            'Motherboard',
            'Keyboards',
            'Mouses',
            'Speakers',
            'Graphics Cards',
            'SSD',
            'RAM',
        ];

        foreach ($categoryes as $categorye) {
            $el = new Category();
            $el->name = $categorye;
            $el->save();
        }
    }
}

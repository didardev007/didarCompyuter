<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function PHPUnit\Framework\name;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Asus',
            'Acer',
            'Dell',
            'Samsung',
            'HP',
            'LG',
            'Philips',
        ];

        foreach ($brands as $brand){
            $el = new Brand();
            $el->name = $brand;
            $el->save();
        }
    }
}

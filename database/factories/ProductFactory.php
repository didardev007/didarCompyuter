<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->streetName;
        $isGuarantee = fake()->boolean(50);
        $isUnder_light = fake()->boolean(50);
        $location = DB::table('locations')->inRandomOrder()->first();
        $in_box = DB::table('in_boxes')->inRandomOrder()->first();
        $color = DB::table('colors')->inRandomOrder()->first();
        $brand = DB::table('brands')->inRandomOrder()->first();
        $category = DB::table('categories')->inRandomOrder()->first();
        $country = DB::table('countries')->inRandomOrder()->first();
        return [
            'name' => $name,
            'description' => fake()->paragraph(),
            'price' => rand(400, 1200),
            'guarantee' => $isGuarantee,
            'under_light' => $isUnder_light,
            'location_id' => $location->id,
            'in_box_id' => $in_box->id,
            'color_id' => $color->id,
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'country_id' => $country->id,
        ];
    }
}

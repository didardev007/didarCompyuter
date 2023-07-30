<?php

namespace Database\Seeders;

use App\Models\InBox;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InBoxSeeder extends Seeder
{
    public function run(): void
    {
        $inboxes = range(5,10);


        foreach ($inboxes as $inbox) {
            $el = new InBox();
            $el->name = $inbox;
            $el->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Info\Info;
use Illuminate\Database\Seeder;


class InfoSeeder extends Seeder
{
    public function run()
    {
        Info::factory()->count(50)->create();
    }
}

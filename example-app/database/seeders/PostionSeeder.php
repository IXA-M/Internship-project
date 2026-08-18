<?php

namespace Database\Seeders;

use App\Models\Postion;
use Illuminate\Database\Seeder;


class PostionSeeder extends Seeder
{
    public function run(): void
    {
        Postion::factory()->count(10)->create();
    }
}
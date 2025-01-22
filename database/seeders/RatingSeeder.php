<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
    public function run()
    {
        // Generem 50 valoracions fictícies
        Rating::factory()->count(50)->create();
    }
}

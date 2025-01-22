<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Generar 10 usuaris ficticis
        User::factory()->count(10)->create();
    }
}

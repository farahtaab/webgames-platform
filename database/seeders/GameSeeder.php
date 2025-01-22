<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class GameSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                $imageUrl = "https://picsum.photos/300/200?random=" . rand(1, 1000);

                Game::create([
                    'title' => 'Game ' . fake()->word(),
                    'description' => fake()->sentence(10),
                    'category_id' => $category->id,
                    'url' => 'https://example.com/game-' . rand(1, 100),
                    'image_url' => $imageUrl, // Guardem l'URL de la imatge
                ]);
            }
        }
    }
}

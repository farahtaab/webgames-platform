<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Adventure', 'Action', 'Puzzle', 'Racing', 'Sports', 'Strategy'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'description' => "Category for $category games.",
            ]);
        }
    }
}

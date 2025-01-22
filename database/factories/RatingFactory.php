<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Usuari aleatori
            'game_id' => Game::inRandomOrder()->first()->id, // Joc aleatori
            'rating' => $this->faker->numberBetween(1, 5), // Valoració aleatòria entre 1 i 5
        ];
    }
}

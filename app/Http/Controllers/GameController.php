<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Rating;
use Illuminate\Http\Request;

class GameController extends Controller
    {
        public function rate(Request $request, Game $game)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Comprovar si l'usuari ja ha valorat aquest joc
        $existingRating = $game->ratings()->where('user_id', auth()->id())->first();

        if ($existingRating) {
            // Actualitzar la valoració existent
            $existingRating->update(['rating' => $request->rating]);
            return back()->with('message', 'Your rating has been updated.');
        }

        // Crear una nova valoració
        $game->ratings()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
        ]);

        return back()->with('message', 'Thank you for rating this game!');
    }

    public function show(Game $game)
{
    // Carregar valoracions i usuari associat
    $ratings = $game->ratings()->with('user')->get();

    return view('games.show', compact('game', 'ratings'));
}

}

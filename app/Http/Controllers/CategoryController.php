<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    // Mostra totes les categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Mostra els jocs d'una categoria
    public function show(Category $category)
    {
        $games = $category->games; // Relació definida al model
        return view('categories.show', compact('category', 'games'));
    }
}

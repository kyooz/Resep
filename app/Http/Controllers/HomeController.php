<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "home",
            // "recipes" => Recipe::all()
            "recipes" => Recipe::latest()->filter(request(['search']))->paginate(12)->withQueryString()
        ]);
    }

    public function show(Recipe $recipe)
    {
        return view('recipe', [
            "title" => $recipe->title,
            "recipe" => $recipe
        ]);
    }
}

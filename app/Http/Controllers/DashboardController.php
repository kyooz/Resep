<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'userCount' => User::count(),
            'recipeCount' => Recipe::count(),
            'articleCount' => Article::count(),
            'recipes' => Recipe::where('user_id', auth()->user()->id)->count(),
            'articles' => Article::where('user_id', auth()->user()->id)->count(),
        ];
        

        return view('dashboard.dashboard', $data, [
            'title' => 'Dashboard',
            // 'recipes' => $user->recipes,
            // 'articles' => $user->articles,
        ]);
    }
}

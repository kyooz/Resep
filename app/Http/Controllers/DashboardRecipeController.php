<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.recipes.index', [
            "title" => "Recipes",
            "recipesAll" => Recipe::all(),
            'recipes' => Recipe::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.recipes.create', [
            "title" => "Tambah Resep",
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:recipes',
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images/recipe');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Recipe::create($validatedData);

        return redirect('/dashboard/recipes')->with('success', 'Resep Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('dashboard.recipes.show', [
            'title' => $recipe->title,
            'recipe' => $recipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('dashboard.recipes.edit', [
            "title" => "Edit Resep",
            "recipe" => $recipe,
            "categories" => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file',
            'body' => 'required'
        ];

        if($request->slug != $recipe->slug) {
            $rules['slug'] = 'required|unique:recipes';
        };

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images/recipe');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Recipe::where('id', $recipe->id)
            ->update($validatedData);

        return redirect('/dashboard/recipes')->with('success', 'Resep Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        if($recipe->image) {
            Storage::delete($recipe->image);
        }

        Recipe::destroy($recipe->id);

        return redirect('/dashboard/recipes')->with('success', 'Resep Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Recipe::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

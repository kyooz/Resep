<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Recipe;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.articles.index', [
            "title" => "Articles",
            "articlesAll" => Article::all(),
            'articles' => Article::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            "title" => "Tambah Artikel",
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
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:articles',
            'image' => 'image|file',
            'body' => 'required'

        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images/article');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Article::create($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Artikel Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboard.articles.show', [
            'title' => $article->title,
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboard.articles.edit', [
            "title" => "Edit Artikel",
            "article" => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file',
            'body' => 'required'
        ];

        if($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        };

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images/article');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Article::where('id', $article->id)
            ->update($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Artikel Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->image) {
            Storage::delete($article->image);
        }

        Article::destroy($article->id);

        return redirect('/dashboard/articles')->with('success', 'Artikel Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

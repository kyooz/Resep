@extends('layouts.main')

@section('container')
<article>
    <h2 class="mt-3">{{ $article->title }}</h2>
    {{-- <p>by : kyooz in <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a></p> --}}
    {{-- <img src="https://source.unsplash.com/1200x400?random" class="img-fluid" alt="random"> --}}
    <img src="{{ asset('storage/' . $article->image) }}" width="800" height="400" class="img-fluid mt-5" alt="random">
    <p>{!! $article->body !!}</p>
</article>

<a href="/articles" class="mb-5 text-decoration-none">Back</a>
@endsection
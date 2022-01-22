@extends('layouts.main')

@section('container')
<article>
    <h2 class="mt-3">{{ $article->title }}</h2>
    <img src="{{ asset('storage/' . $article->image) }}" width="800" height="400" class="img-fluid mt-5" alt="random">
    <p>{!! $article->body !!}</p>
</article>

<a href="/articles" class="mb-5 text-decoration-none">Back</a>
@endsection
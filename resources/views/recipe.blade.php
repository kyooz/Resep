@extends('layouts.main')

@section('container')
<article class="mt-5">
    <h2 class="mb-3">{{ $recipe->title }}</h2>
    @if ($recipe->image)
    <img src="{{ asset('storage/' . $recipe->image) }}" width="800" height="400" class="img-fluid"
        alt="{{ $recipe->category->title }}">
    @else
    <img src="https://source.unsplash.com/800x400?{{ $recipe->category->title }}" class="img-fluid"
        alt="{{ $recipe->category->title }}">
    @endif
    <p>{!! $recipe->body !!}</p>
</article>

<a href="/" class="mb-5">Back</a>
@endsection

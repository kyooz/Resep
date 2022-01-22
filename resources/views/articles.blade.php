@extends('layouts.main')

@section('container')

@if ($articles->count())
<div class="container mb-5">
    @foreach ($articles as $article)
    <div class="card mt-5">
        <div class="row">
            <div class="col-lg-4">
                {{-- <img src="https://source.unsplash.com/300x300?random" class="img-fluid" alt="random"> --}}
                <img src="{{ asset('storage/' . $article->image) }}" width="500" height="300" class="img-fluid" alt="random">
            </div>
            <div class="col-lg-8">
                <h4 class="card-title mt-3">{{ $article->title }}</h4>
                <a href="/article/{{ $article->slug }}" class="btn btn-primary">Baca Artikel</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
    <p class="text-center fs-4 mt-5">No article found</p>
@endif

@endsection

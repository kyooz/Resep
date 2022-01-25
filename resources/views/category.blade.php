@extends('layouts.main')

@section('container')
    <h1 class="mt-5 mb-5">Post Category : {{ $category }}</h1>
    
@if ($recipes->count())
<div class="container">
    <div class="row">
        @foreach ($recipes as $recipe)
        <div class="col-lg-4 mb-5">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">{{ $recipe->category->name }}</div>
                
                @if ($recipe->image)
                    <div style="max-height: 500px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $recipe->image) }}" width="500" height="300" class="card-img" alt="{{ $recipe->category->title }}">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/100x100?{{ $recipe->category->title }}" class="card-img" alt="{{ $recipe->category->title }}">
                    @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $recipe->title }}</h5>
                  <a href="/recipe/{{ $recipe->slug }}" class="btn btn-primary">Baca Resep</a>
                </div>
            </div>
        </div>
        @endforeach
@else
    <p class="text-center fs-4">No Post Found</p>
@endif
    
@endsection
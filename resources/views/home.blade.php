@extends('layouts.main')

@section('container')

<div class="container banner d-flex align-items-center mb-5">
    <div class="col-md-6 offset-3">
        <form action="/" method="get">
            {{-- @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif --}}
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search"
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>


@if ($recipes->count())
<div class="container">
    <div class="row">
        @foreach ($recipes as $recipe)
        <div class="col-lg-4 mb-5">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                    {{ $recipe->category->name }}</div>

                @if ($recipe->image)
                <div style="max-height: 500px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $recipe->image) }}" width="500" height="300" class="card-img"
                        alt="{{ $recipe->category->title }}">
                </div>
                @else
                <img src="https://source.unsplash.com/100x100?{{ $recipe->category->title }}" class="card-img"
                    alt="{{ $recipe->category->title }}">
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

    </div>

</div>

<div class="d-flex justify-content-center mb-3">
    {{ $recipes->links() }}
</div>

@endsection

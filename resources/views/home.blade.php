@extends('layouts.main')

@section('container')

<div class="container banner d-flex align-items-center mb-5">
    {{-- <div class="row justify-content-center mb-3 mt-3"> --}}
        <div class="col-md-6 offset-3">
            <form action="/" method="get">
                {{-- @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif --}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    {{-- </div> --}}
</div>


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
                  {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                  <a href="/recipe/{{ $recipe->slug }}" class="btn btn-primary">Baca Resep</a>
                </div>
            </div>
        </div>
        @endforeach
@else
    <p class="text-center fs-4">No Post Found</p>
@endif


{{--         
        <div class="col-lg-4 mb-3">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div> --}}
    </div>
    

    {{-- @foreach ($recipes as $recipe)
        <article class="pb-5">
            <h2>
                <a href="/recipe/{{ $recipe->slug }}" class="text-decoration-none">{{ $recipe->title }}</a>
            </h2>
            <p>by : <a href="#" class="text-decoration-none">{{ $recipe->user->name }}</a> in <a href="/categories/{{ $recipe->category->slug }}" class="text-decoration-none">{{ $recipe->category->name }}</a></p>
            <p>{{ $recipe->body }}</p>

            <a href="/recipe/{{ $recipe->slug }}" class="text-decoration-none">Read More</a>
        </article>
    @endforeach --}}

</div>

<div class="d-flex justify-content-center mb-3">
    {{ $recipes->links() }}
</div>

@endsection

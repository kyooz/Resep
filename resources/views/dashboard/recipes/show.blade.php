@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 ">
                <article>
                    <a href="/dashboard/recipes" class="btn bg-info mb-3">Kembali</a>
                    <a href="/dashboard/recipes/{{ $recipe->slug }}/edit" class="btn bg-warning mb-3">Edit</a>
                    <form action="/dashboard/recipes/{{ $recipe->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger mb-3" onclick="return confirm('Are you sure ?')">Hapus</button>
                    </form>

                    @if ($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img" alt="{{ $recipe->category->title }}">
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $recipe->category->title }}" class="card-img" alt="{{ $recipe->category->title }}">
                    @endif

                    <p>{!! $recipe->body !!}</p>
                </article>
                
                <a href="/dashboard/recipes">Back</a>
            </div>
        </div>
    </div>
@endsection
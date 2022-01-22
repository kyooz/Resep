@extends('layouts.main')

@section('container')
    <h1 class="mt-3 mb-5">Recipe Categories</h1>

    @foreach ($categories as $category)
        <ul>
            <li>
                <a href="/categories/{{ $category->slug }}" class="text-decoration-none mt-3">{{ $category->name }}</a>
            </li>
        </ul>
    @endforeach
    
@endsection
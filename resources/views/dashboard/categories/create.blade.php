@extends('dashboard.layouts.main')

@section('container')
<div class="col-lg-8">
    <form method="post" action="/dashboard/categories" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type=" submit" class="btn btn-primary">Tambah Kategori</button>
    </form>
</div>

<script>
    const name = document.querySelector('#name')
    const slug = document.querySelector('#slug')

    name.addEventListener('change', function () {
        fetch('/dashboard/categories/checkSlug?title=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

</script>
@endsection

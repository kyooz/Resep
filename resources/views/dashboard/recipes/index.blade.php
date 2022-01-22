@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>

@endif

<div class="table-responsive col-lg-12">
    
    {{-- <div class="search-element">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    </div> --}}
    {{-- <div class="input-group mb-3 col-md-4">
        <input type="search" class="form-control" placeholder="Search" aria-label="Search" data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      </div> --}}

      @can('admin')
      <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipesAll as $recipe)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $recipe->title }}</td>
                <td>{{ $recipe->category->name }}</td>
                <td>
                    <a href="/dashboard/recipes/{{ $recipe->slug }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
                    <a href="/dashboard/recipes/{{ $recipe->slug }}/edit" class="badge bg-warning"><i class="fas fa-edit"></i></span></a>
                    <form action="/dashboard/recipes/{{ $recipe->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="bagde bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
      @endcan
      
      @can('writer')
          
      <table class="table table-striped table-sm">
          <thead>
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->category->name }}</td>
                    <td>
                        <a href="/dashboard/recipes/{{ $recipe->slug }}" class="badge bg-info"><i class="fas fa-eye"></i></a>
                        <a href="/dashboard/recipes/{{ $recipe->slug }}/edit" class="badge bg-warning"><i class="fas fa-edit"></i></span></a>
                        <form action="/dashboard/recipes/{{ $recipe->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="bagde bg-danger border-0" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        @endcan
</div>

@endsection

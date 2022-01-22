@extends('dashboard.layouts.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="col-lg-6">
    <form method="post" action="/dashboard/users" class="mb-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="name@gmail.com" value="{{ old('email') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password" placeholder="password">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class=" mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="custom-select" name="role">
                <option selected>Open this select menu</option>
                <option value="Admin">Admin</option>
                <option value="Writer">Writer</option>
            </select>
        </div>

        <button type=" submit" class="btn btn-primary">Add User</button>
    </form>
</div>

@endsection

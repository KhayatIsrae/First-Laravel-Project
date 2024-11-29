@extends('layouts.layout')
@section('content')
    @include('common.sucess')
    <form class="form mt-5" action="{{ route('authentificate') }}" method="post">
        @csrf
        <h3 class="text-center text-dark">Login</h3>
        <div class="form-group">
            <label for="email" class="text-dark">Email:</label><br>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        @error('email')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="form-group mt-3">
            <label for="password" class="text-dark">Password:</label><br>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        @error('password')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="Login">
        </div>
    </form>
@endsection

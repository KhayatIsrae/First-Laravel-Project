@extends('layouts.layout')
@section('content')
    @include('common.sucess')
    <form class="form mt-5" enctype="multipart/form-data" action="{{ route('register') }}" method="post">
        @csrf
        <h3 class="text-center text-dark">Register</h3>
        <div class=" mt-3 ">
            <label for="image" class="fs-5">Profile Image</label>
            <input type="file" name="image" class=" form-control ">
        </div>
        <div class="form-group">
            <label for="name" class="text-dark">name:</label><br>
            <input type="name" name="name" id="name" class="form-control">
        </div>
        @error('name')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
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
        <div class="form-group mt-3">
            <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
            <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
        </div>
        <div class="form-group">
            <label for="remember-me" class="text-dark"></label><br>
            <input type="submit" name="submit" class="btn btn-dark btn-md" value="register">
        </div>
        <div class="text-right mt-2">
            <a href="/login" class="text-dark">Login here</a>
        </div>
    </form>
@endsection

@extends('layout')

@section("title", "Login")
@section('link')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<div class="hidden" id="show">
    <form id="login" method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email:</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="password">Password:</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input class="loginbtn" type="submit" value="Login">
        <label for="register">Don't have an Account:</label>
        <a class="loginbtn btn" href="{{ route('register') }}">Register</a>
    </form>
</div>
@endsection

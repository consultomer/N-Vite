@extends('layout')

@section("title", "Register")
@section('link')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<div class="hidden" id="reg">
    <form id="register" method="post" action="{{ route('register') }}">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Name" required>
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Email Id" required>
        <label for="password">Enter Password:</label>
        <input type="password" name="password" placeholder="Enter Password" required>
        <label for="password">Confirm Password:</label>
        <input type="password" name="cpassword" placeholder="Confirm Password" required>
        <input type="checkbox" class="check-box" required> I agree to the Terms and Conditions
        <input class="loginbtn" type="submit" value="Register">
    </form>
</div>
@endsection

@extends('layout')

@section("title", "Contact Us")
@section('link')
<link rel="stylesheet" href="{{ asset('css/ContactUs.css') }}">
@endsection
@section('content')
<h1>Have Some Questions?</h1>
@if(session('data'))
    <div>
        <h1>
            {{ session('data') }}
        </h1>
    </div>
@endif

<div>
    <form id="query" method="post" action="{{ route('contactus') }}">
        @csrf
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" placeholder="First Name" required>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Email Id" required>
        <label for="messages">Message:</label>
        <textarea name="message" id="messages" placeholder="Enter Your Message..." cols="30" rows="10"></textarea>
        <input type="submit" value="Send Message">
    </form>
</div>
@endsection

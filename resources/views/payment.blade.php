@extends('layout')

@section("title", "Payment")
@section('link')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endsection
@section('content')
@php
    $user = \Auth::guard('web')->user();
    $username = $user->username;
@endphp
<section>
    <h1>Payment Page</h1>
    <div>
        <form id="query" method="post" action="{{ route('c_order') }}">
            @csrf
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" placeholder="First Name" required>
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <label for="Mobile">Mobile:</label>
            <input type="tel" name="mobile" placeholder="Mobile" required>
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Email Id" required>
            <label for="address">Address:</label>
            <input type="text" name="address" placeholder="Address" required>
            <label for="method">Method:</label>
            <select name="method">
                <option value="Home">Home delivery</option>
                <option value="Email">Through Email</option>
            </select>
            <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" min="1" max="100" step="1" value="{{ $data['quantity'] }}">
                <input type="hidden" name="image_src" value="{{ $data['image'] }}">
                <input type="hidden" name="price" value="{{ $data['price'] }}">
            <br>
            <br>
                <input type="submit" value="Place Order">
        </form>
    </div>
</section>
@endsection

@extends('layout')

@section("title", "Card")
@section('link')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')

<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="{{ asset($image) }}" alt="Image" class="d-block w-50 m-auto c-img">
        </div>
    </div>
</div>
<div id="query" class="text-center">
    <a class="col-4 btn btn-primary"
        href="{{ route('cart.add', ['image' => $image, 'price' => $price ]) }}">Add to Cart
    </a>
    <form action="{{ route('cart.place') }}" method="post">
    @csrf
        <input type="hidden" name="quantity" min="1" max="100" step="1" value="1">
        <input type="hidden" name="image" value="{{ $image }}">
        <input type="hidden" name="price" value="{{ $price }}">
    <button class="col-4 btn btn-primary" value="submit">Place Order</button>
    </form>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/card.js') }}"></script>
@endsection

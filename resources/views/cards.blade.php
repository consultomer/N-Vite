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
            <img src="{{ asset($data) }}" alt="Image" class="d-block w-50 m-auto c-img">
            

        </div>
    </div>
</div>
<div id="query">
    <a class="btn btn-primary"
        href="{{ route('list', ['image_src' => $data]) }}">Want
        to Send Mail</a>
    <a class="btn btn-primary"
        href="{{ route('payment', ['image_src' => $data]) }}">Payment
        </a>
</div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/card.js') }}"></script>
    @endsection

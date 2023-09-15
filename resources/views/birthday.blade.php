@extends('layout')

@section("title", "Wedding")
@section('link')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<section>
    <h2 style="text-align: center"><a href="{{ route('birthday') }}">Birthday Invitations</a></h2>
    <ul>
        <li>
            <div class="card">
                <img style="height: 300px;" src="{{ asset('images/birthday1.jpg') }}"
                    class="img-thumbnail card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Birthday Invitation</h5>
                    <p class="card-text">Description of the Birthday invitation</p>
                    <a href="{{ route('card', ['image_src' => asset('images/birthday1.jpg')]) }}"
                        class="btn btn-primary">$50.00</a>
                </div>
            </div>
        </li>
        <li>
            <div class="card">
                <img style="height: 300px;" src="{{ asset('images/birthday2.jpg') }}"
                    class="img-thumbnail card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Birthday Invitation</h5>
                    <p class="card-text">Description of the Birthday invitation</p>
                    <a href="{{ route('card', ['image_src' => asset('images/birthday2.jpg')]) }}"
                        class="btn btn-primary">$100.00</a>
                </div>
            </div>
        </li>
        <li>
            <div class="card">
                <img style="height: 300px;" src="{{ asset('images/birthday3.jpg') }}"
                    class="img-thumbnail card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Birthday Invitation</h5>
                    <p class="card-text">Description of the Birthday invitation</p>
                    <a href="{{ route('card', ['image_src' => asset('images/birthday3.jpg')]) }}"
                        class="btn btn-primary">$150.00</a>
                </div>
            </div>
        </li>
    </ul>
</section>
@endsection

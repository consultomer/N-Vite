@extends('layout')

@section("title", "Cart")
@section('link')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
@php
    $user = \Auth::guard('web')->user();
    $user_id = $user->id;
@endphp
<section>
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Cart Details</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Card</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity/Add if Home delivery</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->where('user_id', $user_id) as $cart)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $cart->image }}</td>
                            <td>{{ $cart->price }}</td>
                            <td> 
                                
                                <form action="{{ route('cart.place', ['cart_id' => $cart->id]) }}" method="post">
                                @csrf
                                <input type="number" name="quantity" min="1" max="100" step="1" value="1">
                                <input type="hidden" name="image" value="{{ $cart->image }}">
                                <input type="hidden" name="price" value="{{ $cart->price }}">
                            </td>
                            <td>
                                <button class="col-4 btn btn-primary" value="submit">Place Order</button>
                                </form>
                                <a class="btn btn-danger"
                                href="{{ route('cart.del', ['id' => $cart->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

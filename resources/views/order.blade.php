@extends('layout')

@section("title", "Order")
@section('link')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
@php
    $user = \Auth::guard('web')->user();
    $username = $user->email;
@endphp
<section>
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Orders Details</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Delivery Method</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->where('userEmail', $username) as $order)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $order->firstname }}</td>
                            <td>{{ $order->userEmail }}</td>
                            <td>{{ $order->delivery_method }}</td>
                            <td>{{ $order->quantity }}</td>
                            @if($order->delivery_method == 'Home')
                                <td>{{ $order->quantity * $order->price }}</td>
                            @else
                                <td>{{ $order->price }}</td>
                            @endif
                            @if($order->status == 'pending')
                                <td><button type="button" class="btn btn-warning">Pending</button></td>
                            @elseif($order->status == 'approved')
                                <td><button type="button" class="btn btn-success">Approved</button></td>
                            @else()
                                <td><button type="button" class="btn btn-danger">Decline</button></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@extends('admin.index')

@section("title", "Orders")
@section('content')
<div class="row my-5">
    <h3 class="fs-4 mb-3">Orders</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Delivery Method</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->firstname }}</td>
                        <td>{{ $order->userEmail }}</td>
                        <td>{{ $order->delivery_method }}</td>
                        @if($order->status == 'pending')
                            <td><button type="button" class="btn btn-warning">Pending</button></td>
                        @elseif($order->status == 'approved')
                            <td><button type="button" class="btn btn-success">Approved</button></td>
                        @else()
                            <td><button type="button" class="btn btn-danger">Decline</button></td>
                        @endif
                        <td>
                            <a
                                href="{{ route('admin.edit', ['id' => $order->id, 'status' => 'approved']) }}">Approve</a>
                            <a
                                href="{{ route('admin.edit', ['id' => $order->id, 'status' => 'declined']) }}">Reject</a>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
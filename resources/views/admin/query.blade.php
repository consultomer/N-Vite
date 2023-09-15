@extends('admin.index')

@section("title", "Query")
@section('content')
<div class="row my-5">
    <h3 class="fs-4 mb-3">Queries</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($queries as $query)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $query->first_name }}</td>
                        <td>{{ $query->last_name }}</td>
                        <td>{{ $query->email }}</td>
                        <td>{{ $query->message }}</td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

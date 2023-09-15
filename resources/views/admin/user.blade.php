@extends('admin.index')

@section("title", "Category")
@section('content')
<div class="row my-5">
    <h3 class="fs-4 mb-3">Category</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admin as $admin)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->password }}</td>
                        <td>
                            <a class="btn btn-danger"
                                href="{{ route('delete_admin', ['id' => $admin->id]) }}">Delete</a>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
<form method="post" action="{{ route('add_admin') }}">
    @csrf
    <label class="form-label" for="name">Add Admin :</label>
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Password">
    <input type="submit" class="btn btn-primary" value="Add">
</form>
@endsection

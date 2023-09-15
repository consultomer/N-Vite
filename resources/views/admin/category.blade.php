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
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-danger"
                                href="{{ route('admin.delcat', ['category_id' => $category->category_id]) }}">Delete</a>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
<form method="post" action="{{ route('add_cat') }}">
    @csrf
    <label class="form-label" for="name">Add Category</label>
    <input type="text" name="name" placeholder="Category">
    <input type="submit" class="btn btn-primary" value="Add">
</form>
@endsection

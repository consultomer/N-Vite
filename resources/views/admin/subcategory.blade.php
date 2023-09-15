@extends('admin.index')

@section("title", "Sub-Category")
@section('content')
<div class="row my-5">
    <h3 class="fs-4 mb-3">Sub-Category</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcate as $subcate)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $subcate->name }}</td>
                        <td>{{ $subcate->category->name }}</td>
                        <td>
                            <a class="btn btn-danger"
                                href="{{ route('admin.delsub', ['subcategory_id' => $subcate->subcategory_id]) }}">Delete</a>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
<form method="post" action="{{ route('add_subcat') }}">
    @csrf
    <label class="form-label" for="name">Add Sub-Category</label>
    <input type="text" name="name" placeholder="Sub-Category">
    <label for="category_id">Select Category:</label>
    <select name="category_id">
        @foreach($category as $category)
            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
        @endforeach
        <input type="submit" class="btn btn-primary" value="Add">
</form>
@endsection

@extends('admin.index')

@section("title", "Items")
@section('content')
<div class="row my-5">
    <h3 class="fs-4 mb-3">Items-List</h3>
    <div class="col">
        <table class="table bg-white rounded shadow-sm  table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{ $item->item_id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->subcategory->name }}</td>
                        <td>{{ $item->subcategory->category->name }}</td>
                        <td>
                            <a class="btn btn-primary"
                                href="{{ route('admin.edititem', ['item_id' => $item->item_id]) }}">Edit</a>
                            <a class="btn btn-danger"
                                href="{{ route('admin.delitem', ['item_id' => $item->item_id]) }}">Delete</a>
                        </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="w-50 p-3">
    <div class="card">
        <div class="card-header">
            <h4>Add Item</h4>
            <div class="card-body">
                <form method="post" action="{{ route('add_item') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="name"><b>Name:</b></label>
                    <br>
                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                    <br>
                    <label for="description"><B>Description</B>:</label>
                    <br>
                    <input class="form-control" type="text" name="description" placeholder="Description" required>
                    <br>
                    <label for="price"><b>Price:</b></label>
                    <br>
                    <input class="form-control" type="text" name="price" placeholder="Price" required>
                    <br>
                    <label for="subcategory_id"><b>Sub-Category:</b></label>
                    <br>
                    <select class="form-select" name="subcategory_id">
                        <option value="">Select-SubCategory</option>
                        @foreach($subcat as $subcat)
                            <option value="{{ $subcat->subcategory_id }}">{{ $subcat->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="image"><b>Select Image:</b></label>
                    <br>
                    <input class="form-control" type="file" accept="image/*" name="image" placeholder="Image" required>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Add Item">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

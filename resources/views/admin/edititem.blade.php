@extends('admin.index')

@section("title", "Edit-Items")
@section('content')
<div class="w-50 p-3">
    <div class="card">
        <div class="card-header">
            <h4>Edit Item</h4>
            <div class="card-body">
                <form method="post" action="{{ route('update_item', ['item_id' => $item->item_id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="name"><b>Name:</b></label>
                    <br>
                    <input class="form-control" type="text" name="name" value="{{ $item->name }}" required>
                    <br>
                    <label for="description"><B>Description</B>:</label>
                    <br>
                    <input class="form-control" type="text" name="description" value="{{ $item->description}}" required>
                    <br>
                    <label for="price"><b>Price:</b></label>
                    <br>
                    <input class="form-control" type="text" name="price" value="{{$item->price}}" required>
                    <br>
                    <label for="subcategory_id"><b>Sub-Category:</b></label>
                    <br>
                    <select class="form-select" name="subcategory_id">
                        @foreach($subcat as $subcat)
                        <option value="{{ $subcat->subcategory_id }}">{{ $subcat->name }}</option>
                        @endforeach
                    </select>
                    <img src="{{asset($item->image_src)}}" class="img-fluid" alt="" style="width:200px;height:200px;">
                    
                    <br>
                    <label for="image"><b>Select Image:</b></label>
                    <br>
                    <input class="form-control" type="file" accept="image/*" name="image" value="{{ $item->image_src}}">
                    <br>
                    <input type="submit" class="btn btn-primary" value="update Item">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

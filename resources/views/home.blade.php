@extends('layout')

@section("title", "Home")
@section('link')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
@foreach(DB::table('category')->get() as $cat)
    <section>
    <h2>
    <a 
        href="{{ route('category', ['id' => $cat->category_id]) }}">{{ $cat->name }}</a>
    </h2>
    @foreach($subcat->where('category_id', $cat->category_id) as $sub)
        <h3 style="text-align: center"> <a href="">{{ $sub->name }}</a></h3>
        <ul>
            @foreach($items->where('subcategory_id', $sub->subcategory_id) as $item)
                <li>
                <div class="card">
                <img style="height: 300px;" src="{{ asset($item->image_src) }}" class="img-thumbnail card-img-top"
                alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <a href="{{ route('view_card', ['id' => $item->item_id]) }}"
                        class="btn btn-primary">${{ $item->price }}.00</a>
                    </div>
                </div>
                </li>
            @endforeach
        </ul>
    @endforeach
    </section>
@endforeach
@endsection

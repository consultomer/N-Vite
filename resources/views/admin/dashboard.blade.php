@extends('admin.index')

@section("title", "Dashboard")
@section('content')
<div class="card w-25">
    <div class="card-body">
        <h5 class="card-title">Total Order:</h5>
        <h1 class="fs-2 badge rounded-pill text-bg-primary">
            {{ $order }}
        </h1>
    </div>
</div>
<br>
<div class="card w-25">
    <div class="card-body">
        <h5 class="card-title">Total Category:</h5>
        <p class="fs-2 badge rounded-pill text-bg-primary">
            {{ $category }}
        </p>
    </div>
</div>
<br>
<div class="card w-25">
    <div class="card-body">
        <h5 class="card-title">Total Sub-Category:</h5>
        <p class="fs-2 badge rounded-pill text-bg-primary">
            {{ $subcate }}
        </p>
    </div>
</div>
<br>
<div class="card w-25">
    <div class="card-body">
        <h5 class="card-title">Total Item:</h5>
        <p class="fs-2 badge rounded-pill text-bg-primary">
            {{ $item }}
        </p>
    </div>
</div>
<br>
<div class="card w-25">
    <div class="card-body">
        <h5 class="card-title">Total Admins:</h5>
        <p class="fs-2 badge rounded-pill text-bg-primary">
            {{ $admin }}
        </p>
    </div>
</div>
@endsection

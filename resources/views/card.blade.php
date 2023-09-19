@extends('layout')

@section("title", "Card")
@section('link')
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet"
    type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
@endsection
@section('content')
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner" id="content-ss">
        <div class="carousel-item active c-item">
            <img src="{{ asset($item->image_src) }}" alt="Image" class="d-block w-50 m-auto c-img">
            <div class="carousel-caption">
                <p>Host</p>
                <h1 id="myHeading">HostName</h1>
                <p id="myPhone">PhoneNo</p>
                <p>At</p>
                <p id="myParagraph2">Location</p>
                <p id="myParagraph3">Custom Message</p>
                <p>On:</p>
                <p id="myDate">Date</p>
            </div>
        </div>
    </div>
</div>

<div id="query">
    <div>
        <label for="hostname" class="form-label">Host Name:</label>
        <input type="text" class="form-control" id="input1" name="hname" placeholder="Hostname">
    </div>
    <div>
        <label for="Phone" class="form-label">Mobile No.</label>
        <input type="text" class="form-control" id="input2" name="ph" placeholder="Mobile Number">
    </div>
    <div>
        <label for="address" class="form-label">Address:</label>
        <input type="text" class="form-control" id="input3" name="adr" placeholder="Address">
    </div>
    <div>
        <label for="messages" class="form-label">Message:</label>
        <textarea class="form-control" name="message" id="input4" placeholder="Enter Your Message..."
            rows="5"></textarea>
    </div>
    <div>
        <label for="date" class="form-label">Date:</label>
        <input class="form-control" type="datetime-local" name="datetime" id="input5">
    </div>
    <div>
        <form method="post" action="{{ route('capture') }}" id="my-form">
            @csrf
            <input type="hidden" name="image" value="{{ $item->image_src }}">
            <input hidden type="text" name="imi" id="imi">
            <a class="col-11 btn btn-primary" id="capture">Process Image</a>
            <input class="col-11 btn btn-primary" type="submit" id="btnSubmit" value="Next">
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#btnSubmit").hide();
        $("#home").hide();

        $('#capture').click(function () {
            takess = document.getElementById('content-ss');
            const screenshotTarget = takess;
            html2canvas(screenshotTarget).then(canvas => {
                dataURL = canvas.toDataURL();
                document.getElementById('imi').value = dataURL;
                $(this).hide();
                $("#btnSubmit").show();
            });
        });
    });

</script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/card.js') }}"></script>
@endsection
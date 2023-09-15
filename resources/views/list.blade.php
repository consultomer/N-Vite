@extends('layout')

@section("title", "List")
@section('link')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection
@section('content')
@if(session('success'))
    <div>
        <h1>
            {{ session('success') }}
        </h1>

    </div>
@endif
<div class="list">
    <form method="post" action="">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="inputTable">
                <tr>
                    <td><input type="text" name="name[]" required></td>
                    <td><input type="email" name="email[]" required></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <button type="button" onclick="addRow()">Add Row</button>
                    </td>
                    <td>
                        <button type="submit">Submit</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<script>
    function addRow() {
        var table = document.getElementById("inputTable");
        var row = table.insertRow();
        var nameCell = row.insertCell();
        var emailCell = row.insertCell();
        nameCell.innerHTML = '<input type="text" name="name[]" required>';
        emailCell.innerHTML = '<input type="email" name="email[]" required>';
    }
</script>
@endsection

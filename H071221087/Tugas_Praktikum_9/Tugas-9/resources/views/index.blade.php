@extends('layouts.main')
@section('title', 'Homepage')
{{-- @endsection --}}
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @section('title')
        Homepage
    @endsection --}}
    <link rel="stylesheet" href="css/style.css">
    <style>
        th,td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="product" >
        <div class="container">
            <h1 class="title mt-3 text-center">Genshin Impact</h1>
            <a href="/addchar" class="btn btn-success">Add Hero</a>
            <table class="table table-bordered mt-4 text-center" style="margin-bottom: 75px ">
                <thead>
                    <tr>
                        <th scope="col">Karakter</th>
                        <th scope="col">Role</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">CRUD BUTTON</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karakter as $row)
                        <tr>
                            <td>{{$row->karakter}}</td>
                            <td>{{$row->role}}</td>
                            <td>{{$row->tipe}}</td>
                            <td>
                                <a href="/viewchar/{{$row->id}}" class="btn btn-warning">View</a>
                                <a href="/editchar/{{$row->id}}" class="btn btn-primary">Edit</a>
                                <a href="/deletechar/{{$row->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>


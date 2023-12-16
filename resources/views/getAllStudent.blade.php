@extends('layout')
@include('include.header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
</head>
<body>
    <div class="row mt-5">
        <div class="col-md-12 col-md-offset">
            <h2>Student List
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <table class="table table-bordered table-responsive">
                <thead>
                    <th>ID Number</th>
                    <th>Name</th>

                </thead>
                <tbody>
                    @foreach($stud as $studs)
                    <tr>
                        <td>{{$studs->idnum}}</td>
                        <td>{{$studs->name}}</td>

                    </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

@endsection

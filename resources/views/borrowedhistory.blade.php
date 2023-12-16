@extends('layout')
@include('include.header')
@section('content')
    <html>
    <head>
        <!-- ... -->
    </head>
    <body>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset">
                <h2>Borrowed Books</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <th>Student Name</th>
                            <th>Book Title</th>
                            <th>Date Borrowed</th>
                            <th>Date Returned</th>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                            <tr>
                                <td>{{$history->studName}}</td>
                                <td>{{$history->bookTitle}}</td>
                                <td>{{Carbon\Carbon::parse($history->date_borrowed)->format("F j, Y h:m a")}}</td>
                                <td>{{$history->date_returned}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection

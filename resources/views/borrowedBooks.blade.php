@extends('layout')
@include('include.header')
@section('content')
    <html>
    <head>

        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset">
                <h2>Borrowed Books</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <th>Book Titles</th>
                        <th>Date Borrowed</th>
                        <th>Student</th>
                        <th>Book To Be Returned</th>
                        <th>Book Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($borrowedbooks as $borrowedbook)
                        <tr>
                            <td>{{$borrowedbook->bookTitle}}</td>
                            <td>{{$borrowedbook->date_borrowed}}</td>
                            <td>{{$borrowedbook->studName}}</td>
                            <td>{{$borrowedbook->date_returned}}</td>
                            <td>{{$borrowedbook->status}}</td>
                            <td> <form action="{{route('toggleBorrowed',['borrowedBooks' => $borrowedbook->id])}}" method="post">
                                @csrf


                                 <input type="submit" value="Click if Returned" class="btn btn-success">
                            </form></td>

                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </body>
    </html>
@endsection

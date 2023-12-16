@extends('layout')
@section('content')
@include('include.studheader')
<html>
    <head>

        </div>
        <div class="row mt-5">
            <div class="col-md-12 col-md-offset">
                <h2>Pending Books</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-1">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <th>Book Title</th>
                        <th>Date Borrowed</th>
                        <th>Book Status</th>

                    </thead>
                    <tbody>
                        @foreach($pendingBooks as $pending)
                        <tr>
                            <td>{{$pending->bookTitle}}</td>
                            <td>{{$pending->date_borrowed}}</td>
                            <td>{{$pending->status}}</td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </body>
    </html>

@endsection

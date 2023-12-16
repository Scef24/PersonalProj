@section('content')
@extends('layout')
@include('include.header')
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
                        <th>Student Name</th>
                        <th>Pending Book</th>
                        <th>Date Borrowed</th>
                        <th>Book Status</th>
                        <th>Click if Claimed</th>
                    </thead>
                    <tbody>
                        @foreach($pendingbook as $pendings)
                        <tr>
                            <td>{{$pendings->studName}}</td>
                            <td>{{$pendings->bookTitle}}</td>
                            <td>{{$pendings->date_borrowed}}</td>
                            <td>{{$pendings->status}}</td>
                            <td>
                                <form action="{{route('togglePending',$pendings->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="idBook" value="{{$pendings->idBook}}">
                                    <input type="hidden" name="studID" value="{{$pendings->studID}}">
                                    <input type="hidden" name="bookTitle" value= "{{$pendings->bookTitle}}">
                                    <input type="hidden" name="studName" value = "{{$pendings->studName}}">
                                    <input type="hidden" name="date_borrowed" value="{{$pendings->date_borrowed}}">
                                    <input type="hidden" name="date_returned" value = "{{$pendings->date_returned}}">

                                     <input type="submit" value="Already CLaimed" class="btn btn-success">
                                </form>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </body>
    </html>



@endsection

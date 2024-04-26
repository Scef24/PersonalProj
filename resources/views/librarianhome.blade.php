@extends('layout')
@include('include.header')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="title">

</div>
<div class="row mt-5">
    <div class="col-md-12 col-md-offset">
        <h2>BOOK LIST
            <button type = "button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-left"><i class="fa fa-plus" aria-hidden="true"></i>Add Book</i></button>

    </div>
</div>
<form action="{{ route('librarianhome') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-outline-secondary">Search</button>
    </div>
</form>

<form action="{{ route('librarianhome') }}" method="GET" class="mb-3">
    @csrf
    <div class="input-group">
        <select name="category" class="form-select">
            <option value="" selected>Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->category }}" {{ $category->category == $selectedCategory ? 'selected' : '' }}>
                    {{ $category->category }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-secondary">Filter</button>
    </div>
</form>

<div class="row">
    <div class="col-md-12 col-md-offset-1">
        <table class="table table-bordered table-responsive">
            <thead>

                <th>Accession Number</th>
                <th>Call Number</th>
                <th>Title</th>
                <th>Publisher</th>
                <th>Author</th>
                <th>Cover</th>
                <th>Category</th>
                <th>Copies</th>
                <th>Action</th>

            </thead>
            <tbody>
                @foreach($geneds as $gened)
                <tr>
                    <td>{{$gened->accession_num}}</td>
                    <td>{{$gened->call_num}}</td>
                    <td>{{$gened->title}}</td>
                    <td>{{$gened->publisher}}</td>
                    <td>{{$gened->author}}</td>
                    <td>
                        @if($gened->image)
                        <img src="{{asset($gened->image) }}"  style="max-width: 100px; max-height: 100px;">
                    @else
                        No Image
                     @endif
                </td>
                    <td>{{$gened->category}}</td>
                    <td>
                        {{$gened->copy}}
                    </td>
                    <td>

                        <a href="#edit{{$gened->id}}" data-bs-toggle="modal" class="btn btn-success"><i class="fa fa-edit">Edit</a>
                        <a href="#delete{{$gened->id}}" data-bs-toggle = "modal" class="btn btn-danger"><i class="fa fa-trash">Delete</a>
                            <a href="#addCopy{{$gened->id}}" data-bs-toggle = "modal" class="btn btn-success"><i class="fa fa-edit">Add A copy</a>
                            @include('action', ['gened' => $gened])
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>

    </div>
</div>
<div class="paginator">
    {{ $geneds->links()}}
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    });
    </script>

@endsection

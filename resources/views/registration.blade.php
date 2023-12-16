@extends('layout')
@section('title','Registration')
@include('include.header')
@section('content')
<div class="container">
    <div class="mt-5">
        @if($errors->any())
            <div class = "col-12">
                @foreach ($errors->all() as $errors)
                <div class ="alert alert-danger">{{$errors}}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
        <div class ="alert alert-danger">{{session('error')}}</div>

        @endif

        @if(session()->has('success'))
        <div class ="alert alert-success">{{session('success')}}</div>

        @endif
    </div>
    <div class="row mt-5">
        <div class="col-md-12 col-md-offset">
            <h2>Add A User

        </div>
    </div>
<form action ="{{route('registration.post')}}" method = "POST"  class = "ms-auto me-auto" style="width:500px">
    @csrf
<div class="mb-3" >
    <label class="form-label" >Full name</label>
    <input type="text" class="form-control" name = "name" >
  </div>

  <div class="mb-3">
    <label class="form-label">Id Number</label>
    <input type="number" class="form-control" name = "idnum" placeholder>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name = "password">
  </div>
  <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
    <input type="checkbox" class="btn-check" id="btncheck1" name="role" value="Student" autocomplete="off">
    <label class="btn btn-outline-primary" for="btncheck1">Student</label>

    <input type="checkbox" class="btn-check" id="btncheck2" name="role" value="librarian" autocomplete="off">
    <label class="btn btn-outline-primary" for="btncheck2">Librarian</label>
</div>

  <button type="submit" class="btn btn-primary mt-">Submit</button>
</form>
</div>
@endsection

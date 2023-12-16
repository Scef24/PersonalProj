@extends('designlogin')
@section('title',' Log in')
@section('content')



 <div class ="form-group">
    <img src="../assets/images/logo.png" class="img-thumbnail logo " style ="max-width:100px;height:auto; opacity: 1.0;" id="loginlogo">
  <div class ="container">
    <div class ="mt-5">
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
</div>
</div>
<form action ="{{route('login.post')}}" method = "POST" >
@csrf
<h3 class="mb-4">Login</h3>
  <div class="form-outline mb-4 ">

  <label class="form-Label" class ="text-color"> ID Number: </label>
    <input type="number" class="form-control form-control-lg" name = "idnum"   aria-required="true">
  </div>

  <div class ="form-outline mb-4">
    <label class="form-Label" > Password: </label>
    <div class = "input-group">
    <input type="password" class="form-control form-control-lg" name = "password" aria-required="true">

</div>
</div>

  <button type="submit" class="btn btn-light btn-block text-uppercase mb-2 rounded-pill shadow-sm" style ="width:100%;">Log-in</button>

  <footer>
    <br>
  <!--<a class="form-group" href="{{route('registration')}}">Register here!</a> -->
</footer>
</form>
<!-- <div class="text-center">

            </div>
</div>
<body>
<div class="body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <p class=".text-light">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a></p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">

          <a class="nav-link" href="{{route('registration')}}">Registration</a>
        </li>
      </ul>
      <a class="nav-link" href="{{route('login')}}">Login as a librarian</a>
    </div>
  </div>
</nav>
</body> -->

@endsection

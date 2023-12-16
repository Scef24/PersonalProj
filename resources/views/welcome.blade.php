@extends('layout')
@section('title','Home Page')
@section('content')
@include('include.studheader')


<link rel="stylesheet" href="asset{{'/css/app.css'}}">
<br><br>
<!-- <h1 class="con" >Choose a Book</h1> -->


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

    <div class="aligndiv" id="cont">
        <div class="container mb-3">
            <form action="{{route('studentBooks',auth()->user()->id)}}" method="post">
                @csrf
                <input type="submit" value="Your Books" id="yourbooks">
            </form>
        </div>
        <div class="container mb-3">
            <form action="{{route('studentPending',auth()->user()->id)}}" method="post">
                @csrf
                <input type="hidden" name="">
                <input type="submit" value="Your Pending Books" id="pendingbooks">
            </form>
        </div>
    </div>

<div class="shelves">
    <div class="shelves-name">
        <div class="trans" id="ease">
            <form action="/books/New" method = "GET">
                <input type = "submit" value = "New Books" id="btnanim"></input>
            </form>
        </div>

        <div class="trans" id="ease">
            <form action="/books/General Education" method = "GET">
                <input type = "submit"  value = "General Education Books" id="btnanim">  </input>
            </form>
        </div>

        <div class="trans" id="ease">
            <form action="/books/Filipiniana" method = "GET">
                <input type = "submit" value = "Filipiniana Books" id="btnanim">  </input>
            </form>
        </div>

        <div class="trans" id="ease">
            <form action="/books/IT Books" method = "GET">
                <input type = "submit" value = "Information Technology Books" id="btnanim"> </input>
            </form>
        </div>

        <div class="trans" id="ease">
            <form action="/books/Fiction" method = "GET">
                <input type = "submit" value = "Fiction Books" id="btnanim"> </input>
            </form>
        </div>

        <div class="trans" id="ease">
            <form action="/books/Research Studies" method = "GET">
                <input type = "submit" value = "Research Studies" id="btnanim"> </input>
            </form>
        </div>


        </div>
</div>


<div class="contents">

 @if(isset($books) && count($books) > 0)

        @foreach($books as $book)
 <div class="card" style="width: 18rem;">
       {{$book->cover}}
       <div class="img">
        @if($book->image)
        <img src="{{ asset($book->image) }}" alt="Book Image" style="max-width: 500px; max-height:500px;">
    @else
        No Image
    @endif
       </div>
        <div class="card-body">
         <h5 class="card-title">{{$book->title}}</h5>
         <p class="card-text">This is a sample book</p>
         <p class="card-text"><b>Publisher:</b> {{$book->publisher}}</p>
         <a type = "button" data-bs-toggle="modal" data-bs-target="#b" class="btn btn-primary pull-left"><i class="fa fa-plus" aria-hidden="true"></i>BORROW</i></a>
         @include('borrowModal',['book' => $book])

</div>
</div>



        @endforeach

        @endif


<!-- </ul>       -->
<!-- <div class="contents"> -->
</div>



        <!-- <script src="assets{{'/js/app.js'}}"></script>  -->
@endsection

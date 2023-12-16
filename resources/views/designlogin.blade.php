<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Log in')</title> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="{{ asset('assets/css/Style.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
<script src="{{ asset('assets/js/showpassword.js') }}"></script> 
  </head> 
  <body> 
  <section class="vh-100"  id="custom-background"  id ="bg-color">
  <div class="container py-5 h-100 ">

    <div class="row d-flex justify-content-center align-items-center h-100  ">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;" id ="bg-color">
          <div class="card-body p-5 text-center">

   <!-- @include('include.header') -->
    @yield('content') 
 
   <script src="{{asset('assets/js/my.js')}}"></script>  
   </div>
</div>
</div> 
</div>
</div>
</div>

   </section> 
  </body>  
</html>
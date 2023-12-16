<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','CPC Library Kiosk')</title>
    <link rel="stylesheet" href="{{asset ('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{asset ('assets/css/Style.css') }}">
  </head>
  <body>
   <!-- @include('include.header') -->
    @yield('content')
    @include('modal-gened')

   <script src="{{asset('assets/js/my.js')}}"></script>
  </body>
</html>

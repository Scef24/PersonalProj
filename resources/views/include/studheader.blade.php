{{--  --}}
<nav class="navbar navbar-expand-lg" id="nav-lib">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/images/logo.png') }}" alt="image" id="cpc">
        <link rel = "stylesheet" href="{{ asset('assets/css/Style.css') }}">
    </a>
    <div class="container-fluid ">
        <a class="navbar-brand" id="ttle">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <div class="design" id="shadow">

                    </div>

                <li class="nav-item" id="dropdownLib">

                        <div class="img">
                            <img src="{{ asset('assets/images/userlogo.png') }}" alt="image" id="userimg">
                        </div>
                    <div class="dropdown ml-5">
                        <button class="btn bg-transparent dropdown-toggle" style="color:black;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>

                            <ul>
                    </div>
                </li>

            </ul>
            @auth
            <!-- <div id="userInfoContainer">
                <div id="userName">
                    {{auth()->user()->name}}</div>
                <div id="userRole">{{auth()->user()->role}}</div>
            </div> -->

            @endauth
        </div>
    </div>
</nav>

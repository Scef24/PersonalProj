<nav class="navbar navbar-expand-lg bg-primary">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/images/logo.png') }}" alt="image">
    </a>
    <div class="container-fluid ">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">Registration</a>
                </li>

            </ul>
            @auth
            <h1>{{ auth()->user()->idnum }}</h1>
            <span class="navbar-text">{{ auth()->user()->name }}</span>
            @endauth
        </div>
    </div>
</nav>

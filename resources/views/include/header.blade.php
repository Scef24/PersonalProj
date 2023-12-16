<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/logo.png') }}" alt="image">
        </a>
        <div class="container-fluid">
            <a class="navbar-brand" id="ttle">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mr-5 mb-lg-0" id="dropdown">
                    <li class="nav-item" id="dropdownLib">
                        <div class="dropdown ml-5">
                            <button class="btn btn-secondary dropdown-toggle;" type="button" data-bs-toggle="dropdown"
                                aria-expanded="true" id="ddlib">
                                Menu
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" id="menu">
                                <li><a class="dropdown-item" href="{{route('librarianhome')}}">Books List</a></li>
                                <li><a class="dropdown-item" href="{{route('borrowedBooks')}}">Books Borrowed</a></li>
                                <li><a class="dropdown-item" href="{{ route('pendingBooks') }}">Pending Books</a></li>
                                <li><a class="dropdown-item" href="{{ route('borrowedhistory') }}">History</a></li>
                                <li><a class="dropdown-item" href="{{route('getAllStudent')}}">Student List</a></li>
                                <li><a class="dropdown-item" href="{{ route('registration') }}">Add a User</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            @auth
                            <div id="userInfoContainer">
                                <div id="userName">
                                    {{auth()->user()->name}}
                                </div>
                                <div id="userRole" style="float:left;" class="left-align">
                                    {{auth()->user()->role}}</div>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>

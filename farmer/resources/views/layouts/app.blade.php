<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    
    {{-- Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,0,0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- CSS --}}
    <style>
        * {
            font-family: "Nunito", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
        html {
            height: 100%;
        }
        .icon-circle {
            width: 140px;
            height: 140px;
            background-color: #4B6F44;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 72px; /* Adjust as needed */
            margin: 0 auto;
        }
        .custom-dropdown {
            background-color: #4B6F44;
        }
        .custom-dropdown .dropdown-item:hover {
            background-color: #365A32; /* Slightly darker shade for hover */
        }
    </style>

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body>
    <div id="app">

        {{-- navbar bg and logo --}}
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background: #4B6F44">
            <div class="container">
                <a class="navbar-brand disable d-flex align-items-center" href="{{ url('/') }}" style="color: white">
                    <span class="material-icons">
                        agriculture
                    </span>
                    Farmer
                </a>

                {{-- Toggle button --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        {{-- Not Logged in --}}
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="btn" href="{{ route('login') }}" style="color: #4B6F44; background:white; font-weight:bolder">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn" href="{{ route('register') }}" style="color: #4B6F44; background:white; font-weight:bolder; margin-left:1rem">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                            {{-- Links for regular users --}}
                            @if(!Auth::user()->isAdmin)
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/home') }}">Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/user-notice') }}">Notice</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/crop') }}">Crop</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/agroforestry') }}">Agroforestry</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/livestock') }}">Livestock</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/silo') }}">Silo</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ url('/equipment') }}">Equipment</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('weather.show') }}">Weather</a>
                                    </li>
                                </ul>
                            </div>
                            @endif

                            {{-- Admin Links --}}
                            @if(Auth::user()->isAdmin)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.users') }}">Approve</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.all-users') }}">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('notice.index') }}">Notice</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-weight-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background: #4B6F44">
                                    <a style="background: #4B6F44" class="dropdown-item text-white font-weight-bold" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('carousel')
            @yield('content')
            @yield('jumbotron')
        </main>
    </div>

    @yield('footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

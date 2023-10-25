<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="day-mode">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{route('incidencias.index')}}">
                        Comenta tu Chisme
                    </a>
                @else
                <a class="navbar-brand" href="{{route('incidencias.mine')}}">
                    Comenta tu Chisme
                </a>
                @endguest

                <a class="navbar-brand" href="{{route('incidencias.index')}}"><b>Incidencias</b></a>
                <a class="navbar-brand" href="{{route('departments.index')}}"> Departamentos</a>
                @auth
                    @if(auth()->user()->department->id == 4)
                        <a class="navbar-brand" href="{{route('categorias.index')}}"> Categorias</a>
                        <a class="navbar-brand" href="{{route('prioridads.index')}}"> Prioridad</a>
                        <a class="navbar-brand" href="{{route('estados.index')}}"> Estado</a>
                    @endif
                @endauth
                <button id="toggle-mode-button" style="border: none; background: none;">
                    <img id="light-mode-image" src="/images/modo_claro.ico" alt="Modo Claro" style="display: block; width: 30px; height: 30px;">
                    <img id="dark-mode-image" src="/images/modo_oscuro.ico" alt="Modo Oscuro" style="display: none; width: 20px; height: 20px;">
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>


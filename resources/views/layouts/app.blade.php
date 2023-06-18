<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="/css/index.css" rel="stylesheet">
</head>

<body>
    <div id="app" class="content">
        <nav class="navbar navbar-expand-md bg-color shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand h5 mt-2" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('home') }}">HomePage</a>
                        </li>
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('events.index') }}">EventUp</a>
                        </li>
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('notes.index') }}">NoteHub</a>
                        </li>
                        <li class="nav-item h5">
                            <a class="nav-link" href="{{ route('decks.index') }}">FlashCards</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item h5">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item h5">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown h5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                                    <a class="dropdown-item"
                                        href="{{ route('profile.show', ['id' => Auth::user()->id]) }}">Profile</a>
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

    <footer id="footer" class="footer p-5 text-dark align-items-center footer align-bottom bg-color">
        <div class="row">
            <div class="col-lg-4 col-sm-6 pt-2">
                <a class="title h2" href="{{ url('/') }}" style="text-decoration: none">StudyLah</a>
            </div>
            <div class="col-lg-8 col-sm-6 pt-md-2 text-sm-start text-lg-end">
                Copyright © 2023 StudyLah - All Rights Reserved
            </div>
        </div>
    </footer>
</body>

</html>

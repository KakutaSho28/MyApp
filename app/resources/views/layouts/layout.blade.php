<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/basketball" rel="stylesheet">
    <link href="{{ asset('css/tba.css') }}" rel="stylesheet">
</head>
<body>
<div id='app'></div>
<div>
@auth
    <nav class="navbar navbar-expand-md navbar-light bg-purple shadow-sm">
        <div class="container">
            <a class="nav-icon" href="{{ route('home') }}">
                <h1 class="nav-title">Thinking<span class="basketball">Basketball</span>Academy</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(Auth::user()->img == "")
                        <img class="mr-2" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="{{ asset('none_img_boy.jpg') }}">{{ Auth::user()->name }} <span class="caret"></span>
                        @else
                            <img class="mr-2" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;" src="{{ asset('storage/img/'.Auth::user()->img) }}">{{ Auth::user()->name }} <span class="caret"></span>
                        @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="page-item dropdown-item" href="{{ route('user.detail',Auth::id() )}}">
                                {{ __('マイページ')}}
                            </a>
                            @if(Auth::user()-> role == 1)
                            <a class="page-item dropdown-item" href="{{ route('liked.view',Auth::id()) }} ">
                                {{ __('いいねした投稿')}}
                            </a>
                            @elseif(Auth::user()-> role == 0)
                            <a class="page-item dropdown-item" href="{{route('account',Auth::id())}} ">
                                {{ __('ユーザー情報')}}
                            @endif
                            <a class="page-item logout dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('ログアウト') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@endauth
    <main class="py-4">
        @yield('content')
    </main>
</div>
<div class="text-center m-4"> © ThinkingBasketballAcademy</div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tba.js') }}" defer></script>

</html>
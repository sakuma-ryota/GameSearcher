<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Laravelのjavascriptの読み込み -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- 自作のjavascriptの読み込み -->
    <script type="text/javascript" src="js/admin.js" defer></script>

    <!-- トップに戻るボタン -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- laravelのCSSの読み込み -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- 自作のCSSの読み込み -->
    <link href="{{ asset('css/admin.css')}}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="applicationtitle navbar-brand mr-auto ml-3" href="{{ url('/admin') }}">GameSearcher</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-auto " id="navbarToggler">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ml-3"><a class="nav-link" href="{{ url('/admin/game/create') }}">アプリの新規登録</a></li>
                    <li class="nav-item ml-3"><a class="nav-link" href="{{ url('/admin/game') }}">登録アプリ一覧</a></li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li><a class="nav-link ml-3" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                        <li><a class="nav-link ml-3" href="{{ route('register') }}">{{ __('messages.Register') }}</a></li>
                    @else
                        <li class="mr-4 nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle ml-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth ::user()->name }} <span class="create"></span>
                            </a>
                            <div class="dropMenu dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <h1 class="text-center mt-4">GameSearcher</h1>
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

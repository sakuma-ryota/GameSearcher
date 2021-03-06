<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Laravelのjavascriptの読み込み -->
    <script src="{{ asset('js/app.js')}}" defer></script>

    <!-- 自作のJavaScriptの読み込み -->
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
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto mt-5 text-center">
                    <h1>GameSearcher</h1>
                </div>
            </div>
            <div class="row">
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

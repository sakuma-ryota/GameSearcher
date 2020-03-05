<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Laravelのjavascripiptの読み込み -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- laravelのCSSの読み込み -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <!-- 自作のCSSの読み込み -->
    <link href="{{ secure_asset('css/admin.css') }}" rel ="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app,name', 'メイン') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class="navbar-nav ml-auto">

                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-8 mx-auto">GameSearcher</div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
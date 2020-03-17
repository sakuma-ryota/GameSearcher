@extends('layouts.flont')

@section('title','アプリ一覧')

@section('content')
    <div class="container">
    <nav class="jampreleace navbar navbar-expand-lg navbar-light bg-light">
        <h3 class="mt-2">リリース月</h3>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="#01">01月</a>
                <a href="#02">02月</a>
                <a href="#03">03月</a>
                <a href="#04">04月</a>
                <a href="#05">05月</a>
                <a href="#06">06月</a>
                <a href="#07">07月</a>
                <a href="#08">08月</a>
                <a href="#09">09月</a>
                <a href="#10">10月</a>
                <a href="#11">11月</a>
                <a href="#12">12月</a>
            </div>
        </div>
    </nav>
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-md-8 ml-auto mt-3">
                    <form action="{{ action('User\GameController@index') }}" method="get">
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center m-auto text-right">ジャンル</div>
                            <div class="col-md-7">
                                <select class="form-control" name="cond_genre" value="{{ old('cond_genre') }}">
                                    <option></option>
                                    <option value="RPG">RPG</option>
                                    <option value="アクション">アクション</option>
                                    <option value="シミュレーション">シミュレーション</option>
                                    <option value="カードゲーム">カードゲーム</option>
                                    <option value="パズル">パズル</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-info" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $game)
                    <div class="main col-md-5 col-sm-10 mx-auto mb-4 text-center" id="{{ $game->releace_m }}">
                        <div class="icon-day row">
                            <div class="image col-6 ">
                                <a href="{{ $game->link }}"><img src="{{ asset('storage/image/' . $game->image_path) }}" class="icon-image"></a>
                            </div>
                            <div class="releace col-6 m-auto text-left">
                                {{ $game->releace }}
                            </div>
                        </div>
                        <a href="{{ $game->link }}"><div class="title">{!! nl2br(e($game->title)) !!}</div></a>
                        <div class="genre">{{ $game->genre }}</div>
                        <div>
                            <a href="{{ $game->applink }}"><img src="images/appstore.png" class="applink d-block mx-auto"></a>
                        </div>
                        <div>
                            <a href="{{ $game->googlelink }}"><img src="images/googleplay.png" class="googlelink d-block mx-auto"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="pageTopBtnBox" style="position: fixed;bottom: 100px;right: 20px; display:none">
        <button id="pageTopBtn" type="button" class="btn btn-lg btn-dark" ><span class="h1"><i class="fa fa-angle-up"></span></i></button>
    </div>       
@endsection

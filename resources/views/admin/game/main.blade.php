@extends('layouts.admin')

@section('title','アプリ一覧')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 text-right">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">リリース月</button>
                        <ul class="dropMenu dropdown-menu" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="#01">01月</a></li>
                            <li><a class="dropdown-item" href="#02">02月</a></li>
                            <li><a class="dropdown-item" href="#03">03月</a></li>
                            <li><a class="dropdown-item" href="#04">04月</a></li>
                            <li><a class="dropdown-item" href="#05">05月</a></li>
                            <li><a class="dropdown-item" href="#06">06月</a></li>
                            <li><a class="dropdown-item" href="#07">07月</a></li>
                            <li><a class="dropdown-item" href="#08">08月</a></li>
                            <li><a class="dropdown-item" href="#09">09月</a></li>
                            <li><a class="dropdown-item" href="#10">10月</a></li>
                            <li><a class="dropdown-item" href="#11">11月</a></li>
                            <li><a class="dropdown-item" href="#12">12月</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-7 text-right">
                    <form action="{{ action('Admin\GameController@show') }}" method="get">
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center m-auto">ジャンル</div>
                            <div class="col-md-7">
                                <select class="form-control" name="cond_genre" value="{{ old('cond_genre') }}">
                                    <option></option>
                                    <option value="RPG">RPG</option>
                                    <option value="シュミレーションRPG">シュミレーションRPG</option>
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
                            <div class="col-6">
                                <a href="{{ $game->link }}"><img src="{{ $game->image_path }}" class="main-icon"></a>
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
    <div id="pageTopBtnBox" style="position: fixed;bottom: 100px;right: 20px; display:none">
        <button id="pageTopBtn" type="button" class="btn btn-lg btn-dark" ><span class="h1"><i class="fa fa-angle-up"></span></i></button>
    </div>
    </div>
@endsection

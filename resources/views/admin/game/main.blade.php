@extends('layouts.admin')

@section('title','アプリ一覧')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 text-right">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">リリース月</button>
                        <ul class="drop_menu dropdown-menu" aria-labelledby="dropdown">
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
                    <form action="{{ action('Admin\GameIndexController@index') }}" method="get">
                        <div class="form-group row">
                            <div class="col-md-3 align-items-center m-auto">ジャンル</div>
                            <div class="col-md-7">
                                <select class="form-control" name="cond_genre" value="{{ old('cond_genre') }}">
                                    <option></option>
                                    <option value="RPG">RPG</option>
                                    <option value="シミュレーションRPG">シミュレーションRPG</option>
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
                    <div class="main col-md-5 col-10 mx-auto mb-4 text-center" id="{{ $game->releace_m }}">
                        <div class="mt-3 row">
                            <div class="col-6">
                                <a href="{{ $game->link }}"><img src="{{ $game->image_path }}" class="main_icon m-auto img-fluid"></a>
                            </div>
                            <div class="releace_y_m_d col-6 d-block d-sm-none m-auto text-center">
                                {!! nl2br(e($game->releace_y_m_d)) !!}
                            </div>
                            <div class="releace col-6 m-auto d-none d-sm-block text-center">
                                {{ $game->releace }}
                            </div>
                        </div>
                        <a href="{{ $game->link }}"><div class="title mt-3">{!! nl2br(e($game->title)) !!}</div></a>
                        <div class="mt-2">{{ $game->genre }}</div>
                        @if ($game->applink != NULL)
                            <div class="mt-2">
                                <a href="{{ $game->applink }}"><img src="images/appstore.png" class="applink m-auto mx-auto"></a>
                            </div>
                        @endif
                        @if ($game->googlelink != NULL)
                            <div class="mb-2">
                                <a href="{{ $game->googlelink }}"><img src="images/googleplay.png" class="googlelink m-auto mx-auto"></a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
    <div id="pageTopBtnBox" style="position: fixed;bottom: 100px;right: 20px; display:none">
        <button id="pageTopBtn" type="button" class="btn btn-lg btn-dark" ><span class="h1"><i class="fa fa-angle-up"></span></i></button>
    </div>
    </div>
@endsection

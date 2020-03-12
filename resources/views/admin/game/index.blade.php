@extends('layouts.admin')

@section('title', '登録アプリ一覧')

@section('content')
    <div class="container">
        <div class="col-md-12 mx-auto">
            <div class="row">
                <h2>登録アプリ一覧</h2>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <a href="{{ action('Admin\GameController@add') }}" class="btn btn-info">新規登録</a>
                </div>
                <div class="col-md-7">
                    <form action="{{ action('Admin\GameController@index') }}" method="get" float-right>
                        <div class="form-group row">
                            <div class="col-md-2 d-flex align-items-center text-align-right">ジャンル</div>
                            <div class="col-md-6">
                                <select class="form-control" name="cond_genre" value="{{ old('cond_genre') }}">
                                    <option></option>
                                    <option value="RPG">RPG</option>
                                    <option value="アクション">アクション</option>
                                    <option value="シミュレーション">シミュレーション</option>
                                    <option value="カード">カード</option>
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
                <div class="admin-game col-md-12 mx-auto">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">画像を表示させたい</th>
                                <th width="20%">タイトルを入力どおり表示させたい</th>
                                <th width="20%">リリース日</th>
                                <th width="25%">ジャンル</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $game)
                                <tr>
                                    <th>{{ $game->id }}</th>
                                    <td>
                                        <img src="{{ asset('storage/image/app/public' . $game->image_path) }}">
                                    </td>
                                    <td>{!! nl2br(e($game->title)) !!}</td>
                                    <td>{{ $game->relrece }}</td>
                                    <td>{{ $game->genre }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\GameController@edit', ['id' => $game->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\GameController@delete', ['id' => $game->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

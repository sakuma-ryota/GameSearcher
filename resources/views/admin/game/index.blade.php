@extends('layouts.admin')

@section('title', '登録アプリ一覧')

@section('content')
    <div class="container">
        <div class="col-md-4">
            <div class="row">
                <h2>登録アプリ一覧</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ action('Admin\GameController@add') }}" class="btn btn-info">新規登録</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ ation('Admin\GameController@index') }}" method="get">
                        <div class="form-group row">

                            <!-- とりあえずタイトル 含む検索 -->
                            <label class="col-md-4">タイトル</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
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
                    <div class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">画像を表示させたい</th>
                                <th width="20%">タイトルを入力どおり表示させたい</th>
                                <th width="20%">年改行 月日で表示させたい</th>
                                <th width="15%">ジャンル</th>
                                <th width="15%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $game)
                                <tr>
                                    <th>{{ $game->id }}</th>
                                    <td>{{ $game->image }}</td>
                                    <td>{{ $game->title }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

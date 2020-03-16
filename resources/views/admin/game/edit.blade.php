@extends('layouts.admin')

@section('title', '登録アプリの編集')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>登録アプリの編集</h2>
            <form action="{{ action('Admin\GameController@update') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-3" for="image">アイコン</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="title">タイトル</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="title">{{ $game_form->title }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="releace">リリース日</label>
                    <div class="col-md-5">
                    <input id="releace" type="text" class="form-control datepicker" name="releace" value="{{ $game_form->releace }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="genre">ジャンル</label>
                    <div class="col-md-5">
                        <select class="form-control" name="genre">
                            <option value="RPG" @if ($game_form->genre=='RPG') selected @endif>RPG</option>
                            <option value="アクション" @if ($game_form->genre=='アクション') selected @endif>アクション</option>
                            <option value="シュミレーション" @if ($game_form->genre=='シュミレーション') selected @endif>シミュレーション</option>
                            <option value="カードゲーム" @if ($game_form->genre=='カードゲーム') selected @endif>カードゲーム</option>
                            <option value="パズル" @if ($game_form->genre=='パズル') selected @endif>パズル</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="applink">App Store</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="applink" value="{{ $game_form->applink }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="googlelink">Google play</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="googlelink" value="{{ $game_form->googlelink }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" value="{{ $game_form->id }}" name="id">
                <div class="form-group row">
                    <input type="submit" class="btn btn-info" value="編集">
                </div>
            </form>
            <div div class="row mt-3">
                <div class="col-md-5">
                    <h2>編集履歴</h2>
                    <ul class="list-group">
                        @if ($game_form->histories != NULL)
                            @foreach ($game_form->histories as $history)
                                <li class="list-group-item">{{ $history->edited_at }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection

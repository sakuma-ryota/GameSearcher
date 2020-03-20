@extends('layouts.admin')

@section('title', 'アプリ登録')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>アプリの登録</h2>
            <form action="{{ action('Admin\GameController@create') }}" method="post" enctype="multipart/form-data">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-3">アイコン</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">タイトル</label>
                    <div class="col-md-5">
                        <textarea rows="2" class="form-control" name="title">{{ old('title') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">リリース日</label>
                    <div class="col-md-5">
                    <input id="birthdate" type="text" class="form-control datepicker" name="releace" value="{{ old('releace') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">ジャンル</label>
                    <div class="col-md-5">
                        <select class="form-control" name="genre" value="{{ old('genre') }}">
                            <option value="RPG">RPG</option>
                            <option value="アクション">アクション</option>
                            <option value="シミュレーション">シミュレーション</option>
                            <option value="カードゲーム">カードゲーム</option>
                            <option value="パズル">パズル</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">公式HP</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="link" value="{{ old('link') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">App Store</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="applink" value="{{ old('applink') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Google play</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="googlelink" value="{{ old('googlelink') }}">
                    </div>
                </div>
                {{ csrf_field() }}
                <div class="form-group row">
                    <input type="submit" class="btn btn-info" value="登録">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

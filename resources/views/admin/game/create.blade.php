@extends('layouts.admin')

@section('title', 'アプリ登録')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2>アプリの登録</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-md-3">アイコン</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">タイトル</label>
                    <div class="col-md-5">
                        <textarea rows="3" class="form-control" name="title"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">リリース日</label>
                    <div class="col-md-5">
                    <input id="birthdate" type="text" class="form-control datepicker" name="relrece">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">ジャンル</label>
                    <div class="col-md-5">
                        <select class="form-control" name="genre">
                            <option value="1">RPG</option>
                            <option value="2">アクション</option>
                            <option value="3">シミュレーション</option>
                            <option value="4">カードゲーム</option>
                            <option value="5">パズル</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">App Store</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="appurl">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3">Google play</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="googleurl">
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-primary" value="登録">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

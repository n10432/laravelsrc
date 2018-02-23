@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Laravelで簡単なフォームを作ってみる</h3>
 
    <form method="post" action="{{ route('aidataupload') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 
        <div class="form-group">
            <label>filename</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="username" placeholder="氏名を入力してください">
        </div>
        <div class="form-group">
            <label>username</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="email" placeholder="メールアドレスを入力してください">
        </div>
        <div class="form-group">
            <label>filetype</label><span class="label label-danger">必須</span>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="filetype" value="1">画像
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="filetype" value="2">テキスト
                </label>
            </div>
        </div>
        <div class="form-group">
        <label for="photo">ファイル:</label>
        <input id="filedata" type="file" class="form-control" name="filedata">
        </div>
        <div class="form-group">
            <label>explanation</label>
            <textarea class="form-control" name="explanation" rows="3" placeholder="内容を入力してください"></textarea>
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">確認する</button>
            </div>
        </div>
    </form>
</div>
@endsection
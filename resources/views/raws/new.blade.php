@extends('layouts.app')
@section('content')

<div class="container">
    <h3>新規生データの登録</h3>
 
    <form method="post" action="{{ url($userid . '/' . $projectname . '/new') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 
        <div class="form-group">
            <label>ファイル名</label>
            <input type="text" class="form-control" name="rawname" placeholder="raw data name">
        </div>
        <div class="form-group">
            <label for="photo">ファイル:</label>
            <input id="filedata" type="file" class="form-control" name="filename">
        </div>
        <div class="form-group">
            <label>explanation</label>
            <textarea class="form-control" name="description" rows="3" placeholder="内容を入力してください"></textarea>
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">register</button>
            </div>
        </div>
    </form>
</div>
@endsection
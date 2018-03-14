@extends('layouts.app')

@section('content')
<div class="container">
生データの加工条件を選択する
<form method="post" action="{{ url($userid . '/' . $projectname . '/raw/' . $rawname . '/format') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 
        <div class="form-group">
            <label>ファイル名</label>
            <input type="text" class="form-control" name="rawname" placeholder="raw data name">
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">加工する</button>
            </div>
        </div>
    </form>
</div>
@endsection
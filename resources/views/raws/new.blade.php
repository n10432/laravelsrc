@extends('layouts.app')
@section('content')

<div class="container">
    <h3>新規プロジェクトの作成</h3>
 
    <form method="post" action="{{ url('new') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 
        <div class="form-group">
            <label>project name</label>
            <input type="text" class="form-control" name="projectname" placeholder="project name">
        </div>
        <div class="form-group">
            <label>file type</label>
            @foreach ($datatypes as $datatype)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="datatype" value={{$datatype}}>{{$datatype}}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label>公開設定</label>
            @foreach ($privacies as $privacy)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="privacy" value={{$privacy}}>{{$privacy}}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label>explanation</label>
            <textarea class="form-control" name="description" rows="3" placeholder="内容を入力してください"></textarea>
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">create</button>
            </div>
        </div>
    </form>
</div>
@endsection
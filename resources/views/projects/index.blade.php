@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2"><div>プロジェクト名</div></div>
        <div class="col-sm-2"><div>データタイプ</div></div>
        <div class="col-sm-4"><div>説明</div></div>
        <div class="col-sm-2"><div>公開レベル</div></div>
    </div>
@foreach ( $projects as $project)
    <div class="row">
        <div class="col-sm-2"><div>{{$project->projectname}}</div></div>
        <div class="col-sm-2"><div>{{$project->datatype}}</div></div>
        <div class="col-sm-4"><div>{{$project->description}}</div></div>
        <div class="col-sm-2"><div>{{$project->privacy}}</div></div>
    </div>
@endforeach
</div>
@endsection

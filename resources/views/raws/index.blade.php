@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2"><div>ファイル名</div></div>
        <div class="col-sm-2"><div>ファイルパス</div></div>
        <div class="col-sm-4"><div>userid</div></div>
        <div class="col-sm-2"><div>プロジェクト名</div></div>
    </div>
@foreach ( $raws as $raw)
    <div class="row">
        <div class="col-sm-2">{{$raw->rawname}}</div>
        <div class="col-sm-2"><div>{{$raw->filepath}}</div></div>
        <div class="col-sm-4"><div>{{$raw->userid}}</div></div>
        <div class="col-sm-2"><div>{{$raw->projectname}}</div></div>
        <div class="col-sm-2"><a href="{{ url($raw->userid . '/' . $raw->projectname . '/raw/' . $raw->rawname . '/format') }}">加工する</a></div>
    </div>
@endforeach
</div>
@endsection
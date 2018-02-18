@extends('layouts.master')

@section('title')
input
@stop

@section('body')
機械学習データ登録フォーム：test
<form action="res" method="post">
登録者名
<input type="input" name="name">
データ名
<input type="input" name="dataname">
公開可否
<input type="input" name="publishing">
ファイルパス
<input type="input" name="filepath">
<input type="submit" value="SEND">
<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
@stop
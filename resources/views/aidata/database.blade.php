@extends('layouts.app')
@section('content')
<table>
@foreach ($items as $item)
<tr>
<td>{{$item->filename}}</td>
<td>{{$item->filetype}}</td>
<td>{{$item->explanation}}</td>
<td>{{$item->username}}</td>
</tr>
@endforeach
</table>
@endsection
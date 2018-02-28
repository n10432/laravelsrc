@extends('layouts.app')

@section('content')
<div class="container">
    <table  class="table table-hover">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">目次</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <th scope="row">1</th>
    <td>
        <a class="navbar-brand" href="{{ url($userid . '/projects') }}">
        プロジェクト一覧
        </a>
    </td>
    </tr>
    <tr>
    <th scope="row">1</th>
    <td>
        <a class="navbar-brand" href="{{ url('new') }}">
        プロジェクトの作成
        </a>
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>
        <a class="navbar-brand" href="{{ url($userid) }}">
        ホーム画面へ飛ぶ
        </a>
      </td>
    </tr>
  </tbody>
    </table>
</div>
@endsection

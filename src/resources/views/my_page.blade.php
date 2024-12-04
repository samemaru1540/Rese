@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}" >
@endsection

@section('content')
<div class="my_page">
  <div class="user_info">
    <table>
      <tr>
        <th>{{$user->name}}さん</th>
      </tr>
      <tr>
        <th>予約情報</th>
        <td>{{ $user->reservation }}</td>
      </tr>
      <tr>
        <th>お気に入り登録</th>
        <td>{{ $user->favorite }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
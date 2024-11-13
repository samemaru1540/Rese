@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css) }}" />
@endsection

@section('content')
<div class="content">
  <div class="reservation-text">
    <p class="text">会員登録ありがとうございます</p>
  </div>
  <form action="/login" class="login__btn">
    <button class="login_btn-submit">ログインする</button>
  </form>
</div>
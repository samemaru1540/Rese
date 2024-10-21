@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="login__content">
  <div class="login__heading">
    <h2>Login</h2>
  </div>
  <form action="/login" class="form" method="post">
    @csrf
    <div class="login__inputs">
      <span class="login__label">&#9993;&#65039;</span>
      <input type="email" name="login__email" placeholder="Email">
    </div>
    <div class="login__inputs">
      <span class="login__label">&#128274;</span>
      <input type="password" name="password" placeholder="Password">
    </div>
    <div class="form__btn">
      <button class="form__btn-submit" type="submit">ログイン</button>
    </div>
  </form>
</div>
@endsection
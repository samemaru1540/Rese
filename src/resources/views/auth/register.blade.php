@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
  <div class="register__heading">
    <h2>Registration</h2>
  </div>
  <form action="/register" class="form" method="post">
    @csrf
    <div class="register__inputs">
      <span class="register__label">&#128100;</span>
      <input type="text" name="name" placeholder="Username">
    </div>
    <div class="register__inputs">
      <span class="login__label">&#9993;&#65039;</span>
      <input type="email" name="email" placeholder="Email">
    </div>
    <div class="register__inputs">
      <span class="login__label">&#128274;</span>
      <input type="password" name="password" placeholder="Password">
    </div>
    <div class="form__btn">
      <button class="form__btn-submit" type="submit">登録</button>
    </div>
  </form>
</div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<form action="/login" class="form" method="post">
  @csrf
  <div class="content">
    <div class="heading">
      <div class="heading__text">
        <h2>Login</h2>
      </div>
    </div>
    <div class="inputs">
      <div class="input">
        <span class="label"><img src="image/メールの無料アイコン.svg" alt="email" class="email__img"></span>
        <div class="text">
          <input type="email" class="input__item" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>
      </div>
      <div class="error__item">
        @error('email')
          <span class="error__message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input">
        <span class="label"><img src="image/鍵のクローズアイコン素材.svg" alt="key" class="password__img"></span>
        <div class="text">
          <input type="password" class="input__item" name="password" placeholder="Password">
        </div>
      </div>
      <div class="error__item">
        @error('email')
          <span class="error__message">{{ $message }}</span>
        @enderror
      </div>
      <div class="form__btn">
        <button class="form__btn-submit" type="submit">ログイン</button>
      </div>
  </div>
</form>
@endsection
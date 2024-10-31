@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<form action="/register" class="form" method="post">
  @csrf
  <div class="content">
    <div class="heading">
      <div class="heading__text">
        <h2>Registration</h2>
      </div>
    </div>
    <div class="inputs">
      <div class="input">
        <span class="label">&#128100;</span>
        <div class="text">
          <input type="text" class="input__item" name="name" value="{{ old('name') }}" placeholder="Username">
        </div>
      </div>
      <div class="error__item">
        @error('name')
          <span class="error__message">{{ $message }}</span>
        @enderror
      </div>
      <div class="input">
        <span class="label">&#9993;&#65039;</span>
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
        <span class="label">&#128274;</span>
        <div class="text">
          <input type="password" class="input__item" name="password" placeholder="Password">
        </div>
      </div>
      <div class="error__item">
        @error('password')
          <span class="error__message">{{ $message }}</span>
        @enderror
      </div>
      <div class="form__btn">
        <button class="form__btn-submit" type="submit">登録</button>
      </div>
  </div>
</form>
@endsection
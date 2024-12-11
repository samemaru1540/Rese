@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
  <div class="content">
    <div class="text">
      <p class="p_text">会員登録ありがとうございます</p>
    </div>
    <form action="/login" class="btn">
      <button class="btn-submit">ログインする</button>
    </form>
  </div>
@endsection
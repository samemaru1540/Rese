@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<form action="/reservation_thanks" class="thanks">
  @csrf
  <div class="content">
    <div class="text">
      <p class="p_text">ご予約ありがとうございます</p>
    </div>
    <form action="/" class="back__btn">戻る</form>
  </div>
</form>
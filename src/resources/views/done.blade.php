@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
  <div class="content">
    <div class="text">
      <p class="p_text">ご予約ありがとうございます</p>
    </div>
    <form action="/" class="btn">
      <button class="btn-submit">戻る</button>
    </form>
  </div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
<form action="/" class="form" method="get">
  @csrf
  <div class="contents">
    @foreach ($shops as $shop)
      <div class="content">
        <div class="item">
          <img src="{{ $shop->image_url }}" alt="イメージ画像" class="shop__image">
          <div class="shop__item">
            <span class="shop__title">{{ $shop->name }}</span>
              <div class="shop__tag">
                <p class="shop__tag-item">#{{ $shop->area->name }}</p>
                <p class="shop__tag-item">#{{ $shop->genre->name }}</p>
              </div>
            <div class="shop__btn">
              <a class="shop__btn-submit" href="/detail/{{ $shop->id }}">詳しく見る</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</form>
@endsection
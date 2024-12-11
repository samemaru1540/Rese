@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
<div class="contents">
  @foreach ($shops as $shop)
    <div class="content">
      <div class="item">
        <img src="{{ $shop->image_url }}" alt="イメージ画像" class="shop__image" />
        <div class="shop__item">
          <span class="shop__title">{{ $shop->name }}</span>
          <div class="shop__tag">
            <p class="shop__tag-item">#{{ $shop->area->name }}</p>
            <p class="shop__tag-item">#{{ $shop->genre->name }}</p>
          </div>
          <div class="shop__btn">
            <!-- 詳しく見るボタン -->
            <a class="shop__btn-submit" href="/detail/{{ $shop->id }}">詳しく見る</a>
            
            <!-- お気に入り登録フォーム -->
            <form action="/detail/{shop_id}/favorite" class="favorite__btn" method="post">
              @csrf
              <button class="favorite__btn-submit">
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <img src="{{ asset('image/でっぷりハートアイコン.svg') }}" alt="お気に入り" class="favorite__img">
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection

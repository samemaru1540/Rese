@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('header')
<div class="search">
  <form action="{{ route('search') }}" method="post">
    @csrf
    <ul class="search__ul">
      <li class="search__li">
        <div class="area__search">
          <select class="create-form__item-select" name="area">
            <option value="">All area </option>
            @foreach($areas as $area)
              <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
          </select>
        </div>
      </li>
      <li class="search__li">
        <div class="genre__search">
          <select class="create-form__item-select" name="genre">
            <option value="">All genre</option>
            @foreach($genres as $genre)
              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
        </div>
      </li>
      <li class="search__li">
        <div class="shop__search-item">
          <img src="/image/検索用の虫眼鏡アイコン素材.svg" alt="虫眼鏡" class="shop__search-img">
          <input type="text" class="shop__search" name="shop" value="{{ old('shop') }}" placeholder="Search ..." >
        </div>
      </li>
    </ul>
  </form>
</div>
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
            <form action="/favorite" class="favorite__btn" method="post">
              @csrf
              <button class="favorite__btn-submit">
                <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                <img src="{{ $shop->isFavorited ? asset('image/でっぷりハートアイコンのコピー.svg') : asset('image/でっぷりハートアイコン.svg') }}" alt="お気に入り" class="favorite__img">
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection

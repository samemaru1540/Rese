@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" >
@endsection

@section('content')
<div class="my_page">
  <p class="user_name">{{ $user->name }}さん</p>
    <div class="contents">
      <div class="user_reservation">
        <table>
          @if($reservations->isEmpty())
            <p>予約情報はありません。</p>
          @else
            @foreach ($reservations as $reservation)
              <tr>
                <th>予約状況</th>
              </tr>
              <tr>
                <th>Shop</th>
                <td>{{ $reservation->shop->name }}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>{{ $reservation->date }}</td>
              </tr>
              <tr>
                <th>Time</th>
                <td>{{ $reservation->time }}</td>
              </tr>
              <tr>
                <th>Number</th>
                <td>{{ $reservation->number }}</td>
              </tr>
            @endforeach
          @endif
        </table>
      </div>
      <div class="content">
        @foreach ($favorites as $favorite)
          <div class="item">
            <img src="{{ $favorite->shop->image_url }}" alt="イメージ画像" class="shop__image" />
            <div class="shop__item">
              <span class="shop__title">{{ $favorite->shop->name }}</span>
              <div class="shop__tag">
                <p class="shop__tag-item">#{{ $favorite->shop->area->name }}</p>
                <p class="shop__tag-item">#{{ $favorite->shop->genre->name }}</p>
              </div>
              <div class="shop__btn">
                <!-- 詳しく見るボタン -->
                <a class="shop__btn-submit" href="/detail/{{ $favorite->shop->id }}">詳しく見る</a>
    
                <!-- お気に入り登録フォーム -->
                <form action="/{{ $favorite->shop->id }}/delete/favorite" class="favorite-delete__btn" method="post">
                  @csrf
                  <button class="favorite__btn-submit">
                    <input type="hidden" name="shop_id" value="{{ $favorite->shop->id }}">
                    <img src="{{ asset('image/ハートのアイコン素材 1.svg') }}" alt="お気に入り">
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>
@endsection

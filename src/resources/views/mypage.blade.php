@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" >
@endsection

@section('content')
<div class="my_page">
  <p class="user_name">{{ $user->name }}さん</p>
    <div class="contents">
      <div class="reservation__contents">
        <div class="user_reservation">
          <p class="text">予約状況</p>
          <table>
            @if($reservations->isEmpty())
              <p class="text2">予約情報はありません。</p>
            @else
              @foreach ($reservations as $reservation)
                <tr>
                  <th><img src="image/シンプルな丸時計のアイコン.svg" alt="時計" class="reservation__img">予約{{$reservation->id }}
                  </th>
                  <th>
                    <form action="{{ route('reservation.delete') }}" class="reservation__delete delete" method="post">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                      <button class="reservation__delete">
                        <img src="image/ノーマルの太さのバツアイコン2.svg" alt="閉じる" class="reservation__img">
                      </button>
                    </form>
                  </th>
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
                  <td>{{ $reservation->formatted_time }}</td>
                </tr>
                <tr>
                  <th>Number</th>
                  <td>{{ $reservation->number }}人</td>
                </tr>
              @endforeach
            @endif
          </table>
        </div>
      </div>
      <div class="favorite__contents">
        <div class="content">
          <p class="text">お気に入り店舗</p>
          @if($favorites->isEmpty())
            <p class="text2">お気に入りの店舗情報はありません。</p>
          @else
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
                    <!-- お気に入り削除フォーム -->
                    <form action="{{ route('favorite.delete') }}" class="favorite-delete__btn" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="favorite__btn-submit">
                        <input type="hidden" name="shop_id" value="{{ $favorite->shop->id }}">
                        <img src="{{ asset('image/でっぷりハートアイコン.svg' ) }}" alt="お気に入り" class="favorite__img">
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="contents">
  <div class="shop__detail">
    <div class="detail__header">
      <div class="back">
        <a href="/" class="back__btn"><</a>
      </div>
      <p class="detail__name">{{ $shop->name }}</p>
    </div>

    <div class="shop__img">
      <img src="{{ $shop->image_url }}" alt="イメージ画像" class="shop__image">
    </div>

    <div class="shop__tag-item">
      <p>#{{ $shop->area->name }}</p>
      <p>#{{ $shop->genre->name }}</p>
    </div>

    <div class="shop__outline">
      <p>{{ $shop->outline }}</p>
    </div>
  </div>
</div>

<form action="/detail/{{ $shop->id }}" class="detail" method="post">
  @csrf
  <div class="contents">
    <div class="content">
      <span class="reservation">予約</span>
      <div class="reservation__input">
        <!--日付入力-->
        <div class="reservation__input-date">
          <input type="date" class="date" name="date"  min="{{ \Carbon\Carbon::today()->toDateString() }}" value="{{ old('date') }}">
          @if ($errors->has('date'))
            <div class="error__message">
              {{ $errors->first('date') }}
            </div>
          @endif
        </div>
        <!--時間選択-->
        <div class="reservation__input-time">
          <select name="time" class="time">
            <option value="17:00" {{ old('time') == '17:00' ? 'selected' : '' }}>17:00</option>
            <option value="17:30" {{ old('time') == '17:30' ? 'selected' : '' }}>17:30</option>
            <option value="18:00" {{ old('time') == '18:00' ? 'selected' : '' }}>18:00</option>
            <option value="18:30" {{ old('time') == '18:30' ? 'selected' : '' }}>18:30</option>
          </select>
          @if ($errors->has('time'))
            <div class="error__message">
              {{ $errors->first('time') }}
            </div>
          @endif
        </div>
        <!--人数選択-->
        <div class="reservation__input-number">
          <select name="number" class="number">
            <option value="1" {{ old('number') == '1' ? 'selected' : '' }}>1人</option>
            <option value="2" {{ old('number') == '2' ? 'selected' : '' }}>2人</option>
            <option value="3" {{ old('number') == '3' ? 'selected' : '' }}>3人</option>
            <option value="4" {{ old('number') == '4' ? 'selected' : '' }}>4人</option>
          </select>
          @if ($errors->has('number'))
            <div class="error__message">
              {{ $errors->first('number') }}
            </div>
          @endif
        </div>
      </div>
        <!--予約内容の確認-->
      <div class="reservation__confirm">
        <table class="reservation__confirm-item">
          <tr>
            <th>Shop</th>
            <td>{{ $shop->name }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td>{{ old('date') }}</td>
          </tr>
          <tr>
            <th>Time</th>
            <td>{{ old('time') }}</td>
          </tr>
          <tr>
            <th>Number</th>
            <td>{{ old('number') }}</td>
          </tr>
        </table>
      </div>
    </div>
    <button class="reservation__btn">予約する</button>
  </div>
</form>
@endsection
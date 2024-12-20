<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rese</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <div class="header">
    <div class="header__item">
      <div class="icon">
        <span class="icon_line"></span>
      </div>
      <a href="/" class="header__logo">Rese</a>
    </div>
    <div class="header__item">
      @yield('header')
    </div>
  </div>
  <main>
    @yield('content')
  </main>
</body>
</html>
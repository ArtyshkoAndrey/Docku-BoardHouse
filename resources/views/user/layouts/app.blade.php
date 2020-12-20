<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
  @include('user.layouts.header', ['theme_menu' => $color_menu ?? 'dark'])
{{--  Тут тупо передаём эту переменную в щапку. ?? это если такой переменной нет, то будет передавать 'dark'. Типо по умолчанию будет передавать если в файле самой странице не передали--}}
{{-- Итого в файле страницы просто передаём этот параметр 'light', а в остальных можно ничего не передавать, так как будет в остальный тёмное меню, а мы уже прописали по умолчию что будет тёмная если шаблон не будет знать такую перемную --}}
  <main>
    @yield('content')
  </main>
</div>
</body>
</html>
{{-- TODO: Тут шаблон страницы для обычный юзеров, не админы. В content падает данные из того файла, который я укажу в бекенде для показа. Каждый ФАЙЛ  подтягивает этот шаблон --}}

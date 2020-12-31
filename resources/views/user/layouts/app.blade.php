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
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/boxicons.min.css') }}">
  <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet"/>
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ str_replace('.', '-', Route::currentRouteName()) . '-page' }}">
<div id="app">
  @include('user.layouts.header', ['theme_menu' => $theme_menu ?? 'dark-menu'])

  <main>
    @yield('content')
  </main>

  @include('user.layouts.footer')
</div>
</body>

<script>
  function toggleSearch() {
    let search = document.getElementsByClassName('search')[0];
    let categoryMenu = document.getElementsByClassName('category-menu')[0];
    if (search.classList.contains('hide')) {
      search.classList.remove('hide');
      categoryMenu.classList.add('hide');
    } else {
      search.classList.add('hide');
      categoryMenu.classList.remove('hide');
    }
  }



  window.onload = function() {
    (function($){
      $.fn.isActive = function(){
        console.log(this)
        let ch = false
        let obj = this
        if(!Array.isArray(this))
          obj = [obj]
        obj.forEach(el => {
          el.hasClass('show') ? ch = true : null
        })
        return ch
      }
    })(jQuery)

    function checkOpenCart() {
      if ($('[aria-labelledby="cart-dropdown"]').isActive() ||
          $('.category-menu .dropdown-menu').isActive()) {
        $('body').css("overflow","hidden");
      } else {
        $('body').css("overflow","auto");
      }
    }

    $('#main-menu').on('show.bs.dropdown', function () {
      setTimeout(() => { checkOpenCart() }, 100)
    })

    $('#main-menu').on('hidden.bs.dropdown', function () {
      setTimeout(() => { checkOpenCart() }, 100)
    })

    $('.category-menu').on('show.bs.dropdown', function () {
      setTimeout(() => { checkOpenCart() }, 100)
    })

    $('.category-menu').on('hidden.bs.dropdown', function () {
      setTimeout(() => { checkOpenCart() }, 100)
    })
  }
</script>
</html>
{{-- TODO: Тут шаблон страницы для обычный юзеров, не админы. В content падает данные из того файла, который я укажу в бекенде для показа. Каждый ФАЙЛ  подтягивает этот шаблон --}}

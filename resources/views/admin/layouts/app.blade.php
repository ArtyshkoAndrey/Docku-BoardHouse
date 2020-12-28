<!DOCTYPE HTML>
<html lang="ru">
<head>
  <!-- Meta tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="viewport" content="width=device-width" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/admin/app.css') }}">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <title>@yield('title')</title>
</head>
<body class="with-custom-webkit-scrollbars with-custom-css-scrollbars dark-mode" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true" data-set-preferred-theme-onload="dark" data-set-preferred-mode-onload="true">

  <noscript>You need to enable JavaScript to run this app.</noscript>
{{--  <div id="app">--}}
    <!-- Page wrapper with navbar, sidebar, navbar fixed bottom, and sticky alerts (toasts) -->
  <div class="page-wrapper with-navbar with-sidebar with-navbar-fixed-bottom">
    <div class="sticky-alerts">
      <!-- Alert Success -->
      @if (session()->has('success'))
        @php($i = 1)
        @foreach (session('success') as $message)
          <!-- Precompiled alert with a complex design -->
          <div class="alert alert-success" role="alert" id="precompiled-alert-{{$i}}">
            <table>
              <tbody>
              <tr>
                <td>
                  <div class="w-50 h-50 d-flex align-items-center rounded-circle"> <!-- w-50 = width: 5rem (50px), h-50 = height: 5rem (50px), d-flex = display: flex, align-items-center = align-items: center, rounded-circle = border-radius: 50%, bg-white = background-color: white -->
                    <div class="m-auto text-white"> <!-- m-auto = margin: auto, text-primary = color: primary-color -->
                      <i class="bx bx-check bx-md" aria-hidden="true"></i>
                      <span class="sr-only">Успешно</span> <!-- sr-only = only for screen readers -->
                    </div>
                  </div>
                </td>
                <td class="pl-20">
                  <h4 class="alert-heading mb-5">Успешно</h4> <!-- mb-5 = margin-bottom: 0.5rem (5px) -->
                  <div>
                    {{ $message }}
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          @php($i++)
        @endforeach
      @endif

      <!-- Alert Errors -->
      @if ($errors->any())
        @php($i = 1)
        @foreach ($errors->all() as $message)
          <!-- Precompiled alert with a complex design -->
          <div class="alert alert-danger" role="alert" id="precompiled-alert-error-{{$i}}">
            <table>
              <tbody>
              <tr>
                <td>
                  <div class="w-50 h-50 d-flex align-items-center rounded-circle"> <!-- w-50 = width: 5rem (50px), h-50 = height: 5rem (50px), d-flex = display: flex, align-items-center = align-items: center, rounded-circle = border-radius: 50%, bg-white = background-color: white -->
                    <div class="m-auto text-white"> <!-- m-auto = margin: auto, text-primary = color: primary-color -->
                      <i class="bx bx-exit bx-md" aria-hidden="true"></i>
                      <span class="sr-only">Ошибка</span> <!-- sr-only = only for screen readers -->
                    </div>
                  </div>
                </td>
                <td class="pl-20">
                  <h4 class="alert-heading mb-5">Ошибка</h4> <!-- mb-5 = margin-bottom: 0.5rem (5px) -->
                  <div>
                    {{ $message }}
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          @php($i++)
        @endforeach
      @endif
    </div>

    @include('admin.layouts.navigation')
    <!-- Content wrapper -->
    <div id="app" class="content-wrapper">
      @yield('content')
    </div>

    <!-- Navbar fixed bottom -->
    <nav class="navbar navbar-fixed-bottom">
      <div class="container">
        <div class="row w-full d-flex justify-content-end">
          <div class="col-auto mx-10">
            <p>При поддержке <a href="https://www.gethalfmoon.com" class="text-danger">Halfmoon</a></p>
          </div>
          <div class="col-auto mx-10">
            <p>Powered by <a href="https://www.vk.com/fulliton" class="text-danger">Fulliton</a></p>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/admin/app.js') }}"></script>
  <script>
    window.onload = function() {
      halfmoon.onDOMContentLoaded();

      @if (session()->has('success'))
        @php($i = 1)
        @foreach (session('success') as $message)
          halfmoon.toastAlert('precompiled-alert-{{$i}}', 2500)
          @php($i++)
        @endforeach
      @endif

      @if ($errors->any())
        @php($i = 1)
        @foreach ($errors->all() as $error)
          halfmoon.toastAlert('precompiled-alert-error-{{$i}}', 2500)
        @php($i++)
        @endforeach
      @endif
    }
  </script>
  @yield('script')
</body>
</html>

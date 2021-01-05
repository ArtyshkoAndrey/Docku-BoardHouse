@extends('user.layouts.app', ['theme_menu' => 'light-menu'])
{{--@extends('user.layouts.app') Это без параметра и следовательно меню придёт dark автоматически --}}
{{-- Говорим шаблону что будет переменная в нём с значением --}}

@section('content')
  <section id="intro" class="container-fluid m-0 d-flex align-items-center">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Магазин cноубордов</h1>
        <span class="subtitle">С одним из лучших<br>ассортиментов в Алматы</span>
        <a href="#" class="preview">Начать покупки <i class="bx bx-sm bx-run"></i></a>
      </div>
    </div>
  </section>

  <section>
    @include('user.layouts.category-preview')
    @include('user.layouts.category-preview')
    @include('user.layouts.category-preview')
    @include('user.layouts.category-preview')
  </section>

  @include('user.layouts.instagram')
@endsection


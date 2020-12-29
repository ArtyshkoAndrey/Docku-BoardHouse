@extends('user.layouts.app', ['color_menu' => 'dark'])
{{--@extends('user.layouts.app') Это без параметра и следовательно меню придёт dark автоматически --}}
{{-- Говорим шаблону что будет переменная в нём с значением --}}

@section('content')
  <section id="intro" class="container-fluid m-0">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Магазин cноубордов</h1>
        <span class="subtitle">С одним из лучших<br>ассортиментов в Алматы</span>
        <a href="#" class="preview">Начать покупки <i class="bx bx-sm bx-run"></i></a>
      </div>
    </div>
  </section>

  <section>
    @include('user.layouts.item-catalog')
    @include('user.layouts.item-catalog')
    @include('user.layouts.item-catalog')
    @include('user.layouts.item-catalog')
  </section>
@endsection


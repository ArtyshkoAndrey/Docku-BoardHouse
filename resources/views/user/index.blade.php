@extends('user.layouts.app', ['theme_menu' => 'light-menu'])
{{--@extends('user.layouts.app') Это без параметра и следовательно меню придёт dark автоматически --}}
{{-- Говорим шаблону что будет переменная в нём с значением --}}

@section('content')
  <section id="intro" class="container-fluid m-0 d-flex align-items-center">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Магазин cноубордов</h1>
        <span class="subtitle">С одним из лучших<br>ассортиментов в Алматы</span>
        <a href="{{ route('product.all') }}" class="preview">Начать покупки <i class="bx bx-sm bx-run"></i></a>
      </div>
    </div>
  </section>

  <section>
    @include('user.layouts.category-preview', ['title' => 'Новое поступление', 'products' => $newProducts])

    @include('user.layouts.category-preview', ['title' => 'Хит продаж', 'products' => $hitProducts])

    @foreach($categories as $category)
      @include('user.layouts.category-preview', ['title' => $category->name, 'products' => $category->products()->get()])
    @endforeach

  </section>

  @include('user.layouts.instagram')
@endsection


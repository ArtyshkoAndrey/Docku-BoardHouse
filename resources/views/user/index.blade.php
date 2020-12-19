@extends('user.layouts.app', ['color_menu' => 'dark'])
{{--@extends('user.layouts.app') Это без параметра и следовательно меню придёт dark автоматически --}}
{{-- Говорим шаблону что будет переменная в нём с значением --}}

@section('content')
  <button type="button" class="btn btn-primary">Добавить в корзину</button>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          Главная страница
          <button type="button" class="btn btn-primary">Button</button>
        </div>
      </div>
    </div>
  </div>
  <example-component></example-component>
{{--  TODO: Это я вывел компонент. Все файлы которые лежать в папке js/components буду автоматически ипортироваться в проект. Если ты создал новый файл, то перезапусти вочер.--}}
{{--TODO: То что ide его не знает и чехочет подцепить js`ом, то не парься, тупо так выводи, потом порешаю.--}}
  @include('user.layouts.product.product-card')
{{--  TODO: Это я подключит файл, в нём обычный html. Таким образом я вывел код карточчки товара что бы не повотрять в разный файлах.--}}
@endsection


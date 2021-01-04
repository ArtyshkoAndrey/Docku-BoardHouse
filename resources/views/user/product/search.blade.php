@extends('user.layouts.app')

@section('content')
{{--  Это один из вариантов, если будут товар то начнёт перебирать, если нет то будет вывводить всё что между empty и endforelse--}}
  <div class="container search-page">
    <div>
      <span class="title">Результат поиска</span>
      <span class="badge">1000</span>
    </div>
    <div class="row">
      @forelse($products as $product)
      <div class="col-6 col-lg-4 col-xl-3 p-0" v-for="i in 4">
        {{ $product->title }}
        @include('user.layouts.item')
      </div>
      @empty
        <div class="not-found">
          <img src="{{ asset('images/search-notfound.svg') }}" alt="zero items">
          <span class="mt-2">
            Извените, мы не смогли найти<br>ничего по запросу
            <span class="query">QUERY</span>
          </span>
          <span class="another mt-2">Попробуйте найти что-то другое</span>
          <a href="#!" class="btn btn-dark mt-2">Вернуться в каталог</a>
        </div>
      @endforelse
    </div>
  </div>

{{--  Второй вариант это делать проверка if на колличество--}}

{{--  @if (count($products))--}}
{{--  @foreach($products as $product)--}}
{{--    <p>{{ $product->title }}</p>--}}
{{--  @endforeach--}}
{{--  @else--}}
{{--    <p>Нет товаров</p>--}}
{{--  @endif--}}
@endsection


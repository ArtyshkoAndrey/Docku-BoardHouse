@extends('user.layouts.app')

@section('content')
{{--  Это один из вариантов, если будут товар то начнёт перебирать, если нет то будет вывводить всё что между empty и endforelse--}}
{{--  @forelse($products as $product)--}}
{{--    @include ('user.layouts.item-catalog') --}}{{-- Сюда передать товары, в этом шаблоне сделать перебор товаров --}}
{{--    <p>{{ $product->title }}</p>--}}
{{--  @empty--}}
{{--    <p>Товароы не найдено</p>--}}
{{--  @endforelse--}}

  <div class="container item-catalog">
    <div>
      <span class="title">Здесь подтянуть имя из переменной</span>
    </div>
    <div class="row">
      <div class="col-6 col-lg-4 col-xl-3 p-0" v-for="i in 4">
        @include('user.layouts.item')
      </div>
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


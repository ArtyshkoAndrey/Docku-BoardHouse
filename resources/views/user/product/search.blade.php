@extends('user.layouts.app')

@section('content')
{{--  Это один из вариантов, если будут товар то начнёт перебирать, если нет то будет вывводить всё что между empty и endforelse--}}
  @forelse($products as $product)
    <p>{{ $product->title }}</p>

  @empty
    <p>Товароы не найдено</p>
  @endforelse


{{--  Второй вариант это делать проверка if на колличество--}}

  @if (count($products))
  @foreach($products as $product)
    <p>{{ $product->title }}</p>
  @endforeach
  @else
    <p>Нет товаров</p>
  @endif
@endsection


{{-- TODO: У тебя в футере лежит инстеграм, её нужно выводить только на главной странице, а ты блок инстаграмма засунул в блок футера--}}

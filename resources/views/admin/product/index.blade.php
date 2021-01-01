@extends('admin.layouts.app')

@section('title', 'Docku - Список товаров')

@section('content')
  <div class="container-fluid mt-20 mb-20">
      <div class="row px-20 justify-content-center">
        <div class="col-12">
          <nav aria-label="Breadcrumb navigation example">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active"><a href="#">Товары</a></li>
              <li class="breadcrumb-item"></li>
            </ul>
          </nav>
        </div>
        <div class="col-12">
          <div class="row align-items-center">
            <div class="col-auto">
              <h3>Товары</h3>
            </div>
            <div class="col-auto px-10">
              <a href="{{ route('admin.product.create') }}" class="btn">Создать новый товар</a>
            </div>
          </div>
        </div>

        <div class="col col-md mb-20 pr-10">
          <form action="{{ route('admin.product.index') }}" method="get">
            <div class="input-group">
              <label for="name"></label>
              <input value="{{ $filter['name'] }}" type="text" name="name" id="name" placeholder="Поиск по имени" class="form-control shadow-none border-none" required>
{{--              <input type="hidden" name="user_name" value="{{ $filter['user_name'] }}">--}}
              <div class="input-group-append">
                <button class="btn rounded-right shadow-none border-none">
                  <i class="bx bx-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

{{--        <div class="col-12 col-md mb-20 px-10">--}}
{{--          <form action="{{ route('admin.order.index') }}" method="get">--}}
{{--            <div class="input-group">--}}
{{--              <label for="no"></label>--}}
{{--              <input value="{{ $filter['no'] }}" type="text" name="no" id="no" placeholder="Номер заказа" class="form-control shadow-none border-none" required>--}}
{{--              <input type="hidden" name="user_email" value="{{ $filter['user_email'] }}">--}}
{{--              <input type="hidden" name="user_name" value="{{ $filter['user_name'] }}">--}}
{{--              <div class="input-group-append">--}}
{{--                <button class="btn rounded-right shadow-none border-none">--}}
{{--                  <i class="bx bx-search"></i>--}}
{{--                </button>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </form>--}}
{{--        </div>--}}

{{--        <div class="col-12 col-md mb-20 px-10">--}}
{{--          <form action="{{ route('admin.order.index') }}" method="get">--}}
{{--            <div class="input-group">--}}
{{--              <label for="user_name"></label>--}}
{{--              <input value="{{ $filter['user_name'] }}" type="text" name="user_name" id="user_name" placeholder="Имя покупателя" class="form-control shadow-none border-none" required>--}}
{{--              <input type="hidden" name="user_email" value="{{ $filter['user_email'] }}">--}}
{{--              <input type="hidden" name="no" value="{{ $filter['no'] }}">--}}
{{--              <div class="input-group-append">--}}
{{--                <button class="btn rounded-right shadow-none border-none">--}}
{{--                  <i class="bx bx-search"></i>--}}
{{--                </button>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </form>--}}
{{--        </div>--}}

        <div class="col-md-auto col-auto">
          <a href="{{ route('admin.order.index') }}" class="btn">Сбросить</a>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-md">
              {{ $products->links('vendor.pagination.halfmoon') }}
            </div>
          </div>
        </div>

        @foreach($products as $product)
        <div class="col-md-12 col-12 mt-10">
          <div class="card border-0 product p-0 m-0 bg-dark-dm">
            <div class="row align-items-center row-eq-spacing p-0 m-0">
              <div class="col-lg-1 col-5 px-0 overflow-hidden">
                <img src="{{ $product->getThumbnail() }}" class="h-auto d-flex w-full rounded m-0 p-0" alt="{{ $product->title }}">
              </div>
              <div class="col-lg col">
                <div class="row">
                  <a href="{{ route('admin.product.edit', $product) }}" class="d-block text-decoration-none col-12 col-lg align-self-center">
                    <p class="text-muted font-weight-bolder m-0 font-size-12">Наименование</p>
                    <p class="font-weight-bold m-0 font-size-14 link-product">{{ $product->title  }}</p>
                    @if($product->trashed())
                      <p class="text-danger font-size-12 m-0">Удалено</p>
                    @endif
                  </a>

                  <div class="col col-lg align-self-center">
                    <p class="text-muted font-weight-bolder m-0 font-size-12">Кол-во</p>
                    <p class="font-weight-bold {{ $product->skuses->sum('pivot.stock') > 0 ? 'text-white-dm' : 'text-danger' }} m-0 font-size-14">{{ $product->skuses->sum('pivot.stock')  }} шт.</p>
                  </div>

                  <div class="col col-lg align-self-center">
                    <p class="text-muted font-weight-bolder m-0 font-size-12">Стоимость</p>
                    <p class="font-weight-bold text-white-dm m-0 font-size-14">{{ number_format($product->price, 0, ',', ' ') }} ₸</p>
                  </div>

                  <div class="col-12 col-lg align-self-center">
                    <p class="text-muted font-weight-bolder m-0 font-size-12">Продаж</p>
                    <p class="font-weight-bold text-white-dm m-0 font-size-14">{{ $product->orders->sum('pivot.amount') }} шт.</p>
                  </div>
                  @if(!$product->trashed())
                  <div class="col-12 col-lg align-self-center">
                    <form action="{{ route('admin.product.destroy', $product) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="z-index: 1000" class="btn bg-transparent d-none d-lg-block shadow-none text-danger border-0"><i class="bx font-size-18 bxs-trash"></i></button>
                      <button type="submit" class="btn bg-danger d-block w-full d-lg-none"><i class="bx font-size-18 bxs-trash"></i></button>
                    </form>
                  </div>
                  @else
                    <div class="col-12 col-lg align-self-center">
                      <form action="{{ route('admin.product.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-transparent shadow-none d-none d-lg-block text-success border-0"><i class="bx font-size-18 bxs-plus-circle"></i></button>
                        <button type="submit" class="btn d-block bg-success w-full d-lg-none"><i class="bx font-size-18 bxs-plus-circle"></i></button>
                      </form>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection

@section('script')
@endsection

@extends('admin.layouts.app')

@section('title', 'Doscu - Список товаров')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">

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
          <h3>Товары</h3>
        </div>

        <div class="col-12 col-md mb-20 pr-10">
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

        <div class="col-md-auto col-12">
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
            <div class="row align-items-lg-center row-eq-spacing p-0 m-0">
              <div class="col-lg-1 col-6 px-0 overflow-hidden">
                <img src="{{ $product->getThumbnail() }}" class="h-auto d-flex w-full rounded m-0 p-0" alt="{{ $product->title }}">
              </div>
              <div class="col-lg col-6">
                <div class="row">
                  <div class="col">
                    <p class="text-muted font-weight-bolder m-0 font-size-12">Наименование</p>
                    <p class="font-weight-bold text-white-dm m-0 font-size-16">{{ $product->title  }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
  </script>
@endsection

@extends('admin.layouts.app')

@section('title', 'Doscu - Список заказов')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">

    <div class="container-fluid mt-20 mb-20">
      <div class="row px-20">
        <div class="col-12">
          <nav aria-label="Breadcrumb navigation example">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Заказы</a></li>
              <li class="breadcrumb-item active">Редактирование заказа №{{ $order->no }}</li>
            </ul>
          </nav>
        </div>
        <div class="col-12 p-10">
          <h3>Редактирование заказа</h3>
        </div>

        <div class="col-lg-4 col-12">
          <div class="row">
            <div class="col-12 p-10">
              <div class="card p-0 m-0 bg-dark-dm">
                <div class="row p-20">
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Номер заказа:</span> {{ $order->no }}</p >
                  </div>
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Покупатель:</span> {{ $order->user->name }}</p >
                  </div>
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Дата покупки:</span> {{ $order->created_at->format('d.m.Y') }}</p >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 p-10">
              <div class="card p-0 m-0 bg-dark-dm">
                <div class="row p-20">
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Адрес доставки:</span> {{ $order->address->address }}</p >
                  </div>
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Имя получателя:</span> {{ $order->address->contact_name }}</p >
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 p-10">
              <div class="card p-0 m-0 bg-dark-dm">
                <div class="row p-20">
                  <div class="col-12">
{{--                    TODO: переделать вывод выбраной компании, хранить имя в бд --}}
                    <p class="m-0"><span class="font-weight-bold">Доставка:</span> КазПочта</p>
                  </div>
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Оплата:</span> {{ \App\Models\Order::$paymentMethodsMap[$order->payment_method] }}</p >
                  </div>
                  <div class="col-12">
                    <p class="m-0"><span class="font-weight-bold">Итого:</span> {{ number_format($order->price + $order->ship_price, 0,',', ' ') }} ₸</p >
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-12 col-lg p-10">
          <div class="card m-0 p-0 bg-dark-dm">
            <div class="row p-20">
              <form action="{{ route('admin.order.update', $order) }}" class="w-full" method="POST">
                @csrf

                <div class="col-12">
                  <div class="form-group">
                    <label for="ship_status" class="required">Статус заказа</label>
                    <select class="form-control" name="ship_status" id="ship_status" required>
                      @foreach(\App\Models\Order::SHIP_STATUS_MAP as $status)
                        <option value="{{ $status }}" {{ old('ship_status', $order->ship_status) === $status }}>{{ \App\Models\Order::$shipStatusMap[$status] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <label for="ship_data-track" class="">Трек номер</label>
                    <input type="text" class="form-control" name="ship_data['track']" id="ship_data-track" placeholder="Трек номер" required="required">
                  </div>
                </div>
                <button class="btn" type="submit">Сохранить</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-12 p-10">
          <hr class="bg-dark">
        </div>
        @foreach($order->items as $item)
          <div class="col-lg-4 col-12 p-10">
            <div class="card p-0 m-0 bg-dark-dm">
              <div class="row p-20 ">
                  <div class="col-12">
                    <div class="row align-items-lg-center">
                      <div class="col-lg-4 col-4 pr-10">
                        <img src="{{ $item->product->getThumbnail() }}" class="img-fluid rounded" alt="{{ $item->product->title }}">
                      </div>
                      <div class="col-lg col pl-10 d-flex flex-column justify-content-center">
                        <h5 class="m-0 font-weight-bolder">{{ $item->product->title }}</h5>
                        <div class="row d-flex d-lg-none">
                          <div class="col font-size-16">
                            <p class="m-0 text-muted">Размер</p>
                            <p class="m-0">{{ $item->skus->title }} </p>
                          </div>
                          <div class="col font-size-16">
                            <p class="m-0 text-muted">Стоимость</p>
                            <p class="m-0">{{ number_format((int) $item->price, 0, ',', ' ') }}  ₸ </p>
                          </div>

                          <div class="col font-size-16">
                            <p class="m-0 text-muted">Кол-во</p>
                            <p class="m-0">{{ $item->amount }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 d-none d-lg-block">
                    <div class="row">
                      <div class="col-lg font-size-16">
                        <p class="m-0 text-muted">Размер</p>
                        <p class="m-0">{{ $item->skus->title }} </p>
                      </div>
                      <div class="col-lg font-size-16">
                        <p class="m-0 text-muted">Стоимость</p>
                        <p class="m-0">{{ number_format((int) $item->price, 0, ',', ' ') }}  ₸ </p>
                      </div>

                      <div class="col-lg font-size-16">
                        <p class="m-0 text-muted">Кол-во</p>
                        <p class="m-0">{{ $item->amount }}</p>
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

@endsection

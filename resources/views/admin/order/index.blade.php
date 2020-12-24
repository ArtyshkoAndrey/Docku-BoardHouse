@extends('admin.layouts.app')

@section('title', 'Doscu - Список заказов')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">

    <div class="container-fluid mt-20 mb-20">
      <div class="row px-20 justify-content-center">
        <div class="col-12">
          <nav aria-label="Breadcrumb navigation example">
            <ul class="breadcrumb">
              <li class="breadcrumb-item active"><a href="#">Заказы</a></li>
              <li class="breadcrumb-item"></li>
            </ul>
          </nav>
        </div>
        <div class="col-12">
          <h3>Заказы</h3>
        </div>

        <div class="col-12 col-md-4 mb-20 px-10">
          <form action="{{ route('admin.order.index') }}" method="get">
            <div class="input-group">
              <label for="email"></label>
              <input type="email" name="email" id="email" placeholder="Заказы покупателя по email" class="form-control shadow-none border-none" required>
              <div class="input-group-append">
                <button class="btn rounded-right shadow-none border-none">
                  <i class="bx bx-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-12 col-md-4 mb-20 px-10">
          <form action="{{ route('admin.order.index') }}" method="get">
            <div class="input-group">
              <label for="no"></label>
              <input type="text" name="no" id="no" placeholder="Номер заказа" class="form-control shadow-none border-none" required>
              <div class="input-group-append">
                <button class="btn rounded-right shadow-none border-none">
                  <i class="bx bx-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-12 col-md-4 mb-20 px-10">
          <form action="{{ route('admin.order.index') }}" method="get">
            <div class="input-group">
              <label for="user_name"></label>
              <input type="text" name="user_name" id="user_name" placeholder="Имя покупателя" class="form-control shadow-none border-none" required>
              <div class="input-group-append">
                <button class="btn rounded-right shadow-none border-none">
                  <i class="bx bx-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-12 col-12 mt-20">
          <div class="card p-0 m-0 bg-dark-dm">
            <div class="table-responsive">
            <table class="table table-hover rounded" id="orders">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Стоимсть</th>
                  <th>Статус</th>
                  <th>Покупатель</th>
                </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr class="{{ \App\Models\Order::getColorColumn($order->ship_status) }}">
                  <th>
                    <p class="my-0">{{ $order->no }}</p>
                    <p class="font-size-9 my-0 font-weight-normal">{{ $order->created_at->format('d.m.Y') }} <span class="text-muted">{{ $order->created_at->format('H:i') }}</span></p>
                  </th>
                  <td>
                    <p class="my-0" data-toggle="tooltip" data-title="{{ 'Товары: ' .  number_format((int)$order->price, 0, ',', ' ') . '  ₸' }} {{ 'Доставка: ' .  number_format((int)$order->ship_price, 0, ',', ' ') . '  ₸' }}">
                      {{ number_format((int)($order->price + $order->ship_price), 0, ',', ' ') }}  ₸
                    </p>
                    <p class="my-0 font-size-9 text-muted">{{ \App\Models\Order::$paymentMethodsMap[$order->payment_method] }}</p>
                  </td>
                  <td>{{ \App\Models\Order::$shipStatusMap[$order->ship_status] }}</td>
                  <td>{{ $order->user->name }}</td>
                </tr>
              @endforeach
              @foreach($orders as $order)
                <tr class="{{ \App\Models\Order::getColorColumn($order->ship_status) }}">
                  <th>
                    <p class="my-0">{{ $order->no }}</p>
                    <p class="font-size-9 my-0 font-weight-normal">{{ $order->created_at->format('d.m.Y') }} <span class="text-muted">{{ $order->created_at->format('H:i') }}</span></p>
                  </th>
                  <td>
                    <p class="my-0" data-toggle="tooltip" data-title="{{ 'Товары: ' .  number_format((int)$order->price, 0, ',', ' ') . '  ₸' }} {{ 'Доставка: ' .  number_format((int)$order->ship_price, 0, ',', ' ') . '  ₸' }}">
                      {{ number_format((int)($order->price + $order->ship_price), 0, ',', ' ') }}  ₸
                    </p>
                    <p class="my-0 font-size-9 text-muted">{{ \App\Models\Order::$paymentMethodsMap[$order->payment_method] }}</p>
                  </td>
                  <td>{{ \App\Models\Order::$shipStatusMap[$order->ship_status] }}</td>
                  <td>{{ $order->user->name }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

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
              <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Заказы</a></li>
              <li class="breadcrumb-item active">Редактирование заказа №{{ $order->no }}</li>
            </ul>
          </nav>
        </div>
        <div class="col-12">
          <h3>Редактирование заказа</h3>
        </div>

        <div class="col-md-12 col-12 mt-10">
          <div class="card p-0 m-0 bg-dark-dm">
            <div class="row">
              <div class="col-ld-4 p-20">
                <form action="{{ route('admin.order.update', $order) }}" method="POST">
                  @csrf
                  <div class="row">
                    <p class="m-0"><span class="font-weight-bold">Номер заказа:</span> {{ $order->no }}</p >
                  </div>
                  <div class="row">
                    <p class="m-0"><span class="font-weight-bold">Покупатель:</span> {{ $order->user->name }}</p >
                  </div>
                  <div class="row">
                    <p class="m-0"><span class="font-weight-bold">Дата покупки:</span> {{ $order->created_at->format('d.m.Y') }}</p >
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection

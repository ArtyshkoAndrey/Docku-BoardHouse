@extends('user.layouts.app')

@section('content')
  <div class="container mt-2">
    <div class="row justify-content-center">
      <div class="col-12">
        <p class="font-weight-bolder h4">Корзина</p>
      </div>
      <div class="col-md-8">

        <div class="row mt-2 mx-0 border cart-items">
              <div class="col-3 p-0">
                <img src="{{ asset('images/item-preview.png') }}" alt="Заголовок" class="w-100" style="object-fit: cover">
              </div>
              <div class="col-md-5 col-9">
                <div class="row h-100 align-items-center">
                  <div class="col-12">
                    <p class="h5 font-weight-normal">Название товара</p>
                    <p class="h6">
                      <span class="text-muted">Размер: </span><span>XXL</span>
                    </p>
                  </div>
                  <div class="col-md-auto d-block d-md-none col-12 ml-auto">
                    <div class="row justify-content-md-start justify-content-between h-100">
                      <div class="col-md-12 col-auto d-flex justify-content-end">
                        <form class="" action="#" method="post">
                          <button type="submit" name="submit" class="p-0 btn bg-transparent border-0 link ml-auto mt-md-3"><i class="bx bx-trash h3"></i></button>
                        </form>
                      </div>
                      <div class="col-md-12 order-first order-md-last col-auto d-flex justify-content-end">
                        <p class="h3 font-weight-normal mr-4">10000 тг</p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-auto d-md-block d-none col-12 ml-auto">
                <div class="row justify-content-md-start justify-content-between h-100">
                  <div class="col-md-12 col-auto d-flex justify-content-end">
                    <form class="" action="#" method="post">

                      <button type="submit" name="submit" class="p-0 btn bg-transparent border-0 link ml-auto mt-md-3"><i class="bx bx-trash h3"></i></button>
                    </form>
                  </div>
                  <div class="col-md-12 order-first order-md-last col-auto d-flex justify-content-end">
                    <p class="h3 font-weight-normal mr-4">9999 тг</p>
                  </div>
                </div>

              </div>
            </div>

      </div>
      <div class="col-md-4 mt-md-0 mt-4">
        <div class="row">
          <div class="col-12 justify-content-end d-flex">

            <a href="{{ route('login') }}" class="text-decoration-none">Войдите в аккаунт, чтобы оплачивать быстрее</a>

          </div>
          <div class="col-12">
            <a href="№!" class="btn btn-orange d-block w-100 mt-2 py-3">Перейти к оплате</a>
          </div>
          <div class="col-12">

            <div class="border w-100 py-3 px-3 mt-2 d-flex justify-content-between">
              <p class="h5 font-weight-normal m-0">Итог заказа</p>
              <p class="h5 font-weight-bolder m-0">1000 тг</p>
            </div>
            <p class="text-muted">*Без учёта доставки</p>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('js')

@endsection


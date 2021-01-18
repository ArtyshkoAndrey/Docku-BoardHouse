@extends('user.layouts.app')

@section('content')
  <div class="container mt-2 cart-page">
    <div class="row justify-content-center">
      <div class="col-12">
        <p class="font-weight-bolder h4" style="color: #2D3134;">Корзина</p>
      </div>
      <div class="col-md-8">
        <div class="row mt-3 mx-0 p-2 border" v-for="i in 3" style="border-color: #A9AEB5 !important; border-radius: 16px;">
          @include('user.cart.item')
        </div>
      </div>
      <div class="col-md-4 mt-md-0 mt-4">
        <div class="row">
          <div class="col-12 justify-content-end d-flex">
            <a href="{{ route('login') }}" class="text-decoration-none" style="font-size: .9em;">Войдите в аккаунт, чтобы оплачивать быстрее</a>
          </div>
          <div class="col-12">
            <a href="#!" class="btn btn-dark d-block w-100 mt-2 py-3 promocode-button">Перейти к оплате</a>
          </div>
          <div class="col-12 mt-2">
            <div class="border w-100 py-3 px-3 mt-2 d-flex justify-content-between" style="border-radius: 10px;">
              <p class="font-weight-normal m-0">Итог заказа</p>
              <p class="font-weight-bold m-0">1000 тг</p>
            </div>
{{--            <p class="text-muted">*Без учёта доставки</p>--}}
          </div>
          <div class="col-12 my-2">
            <hr>
          </div>
          <div class="col-12 mb-3">
            <form>
              <div class="form-outline">
                <input type="email" id="promocode" name="promocode" class="form-control" />
                <label class="form-label" for="promocode">Введите промокод (при наличии)</label>
              </div>
            </form>
          </div>
          <div class="col-12">
            <button class="btn btn-dark d-block w-100 mt-2 py-3 promocode-button">Активировать промокод</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('js')
@endsection


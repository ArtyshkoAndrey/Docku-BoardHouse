@extends('user.layouts.app')

@section('content')
  <div class="container mt-2 cart-page">
    <div class="row justify-content-center">
      <div class="col-12">
        <p class="font-weight-bolder h4" style="color: #2D3134;">Корзина</p>
      </div>
      <div class="col-md-8">
        <div class="row" v-if="!cartLoader">
          <div class="col-12">

            <div class="row mt-3 mx-0 p-2 border" v-for="product in productsCart" style="border-color: #A9AEB5 !important; border-radius: 16px;">
              <div class="col-3 p-1">
                <img :src="product.thumbnail_jpg" :alt="product.title" class="w-100 img-fluid" style="object-fit: cover">
              </div>
              <div class="col-9">
                <div class="row h-100 align-items-between">
                  <div class="col-10">
                    <p class="h5 item-name mt-1">@{{ product.title }}</p>
                    <p class="h6">
                      <span class="item-size">Размер: </span><span>@{{ product.skus.skus.title }}</span>
                    </p>
                  </div>

                  <div class="col-2 d-flex justify-content-end px-0 px-md-2 mt-1 mt-md-2">
                    <button type="button" @click="$store.commit('removeItem', product.item.id)" class="p-0 btn bg-transparent shadow-0 border-0" style="color: #DE6D2D">
                      <i class="bx bxs-trash bx-sm"></i>
                    </button>
                  </div>

                  <div class="col-6 px-0 px-md-3 mb-md-1 mr-auto mt-2 mt-md-0 d-flex justify-content-center justify-content-md-start align-items-end">
                    <div class="d-flex align-items-center">

                      <button type="button" @click="$store.commit('addItem', {id: product.item.id, amount: -1 })" class="btn btn-dark cart-button">
                        <i class="bx bx-minus"></i>
                      </button>

                      <span id="cart-item-amount-1" class="mx-2 mx-md-3" style="font-size: 1.3em;">@{{ product.item.amount }}</span>

                      <button type="button" @click="$store.commit('addItem', {id: product.item.id, amount: 1 })" class="btn btn-dark cart-button">
                        <i class="bx bx-plus"></i>
                      </button>
                    </div>
                  </div>

                  <div class="col-6 px-0 px-md-3 mb-md-1 mt-2 mt-md-0 d-flex justify-content-end align-items-end">
                    <span class="h4 font-weight-bold m-0">
                      @{{ $cost( (product.on_sale ? product.price_sale : product.price) * $store.state.currency.ratio) }} @{{ $store.state.currency.symbol }}
                    </span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div v-else class="row justify-content-center">
          <div class="col-auto">
            <div class="spinner-border" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mt-md-0 mt-4">
        <div class="row">
          <div class="col-12 justify-content-end d-flex" v-if="!$store.state.auth">
            <a href="{{ route('login') }}" class="text-decoration-none" style="font-size: .9em;">Войдите в аккаунт, чтобы оплачивать быстрее</a>
          </div>
          <div class="col-12">
            <a href="{{ route('order.create') }}" class="btn btn-dark d-block w-100 mt-2 py-3 promocode-button" :class="$store.state.cart.items.length < 1 ? 'disabled' : null">Перейти к оплате</a>
          </div>
          <div class="col-12 mt-2">
            <div class="border w-100 py-3 px-3 mt-2 d-flex justify-content-between" style="border-radius: 10px;">
              <p class="font-weight-normal m-0">Итог заказа</p>
              <p class="font-weight-bold m-0">@{{ $cost($store.getters.priceAmount) }} @{{ $store.state.currency.symbol }}</p>
            </div>
{{--            <p class="text-muted">*Без учёта доставки</p>--}}
          </div>
{{--          <div class="col-12 my-2">--}}
{{--            <hr>--}}
{{--          </div>--}}
{{--          <div class="col-12 mb-3">--}}
{{--            <form>--}}
{{--              <div class="form-outline">--}}
{{--                <input type="email" id="promocode" name="promocode" class="form-control" />--}}
{{--                <label class="form-label" for="promocode">Введите промокод (при наличии)</label>--}}
{{--              </div>--}}
{{--            </form>--}}
{{--          </div>--}}
{{--          <div class="col-12">--}}
{{--            <button class="btn btn-dark d-block w-100 mt-2 py-3 promocode-button">Активировать промокод</button>--}}
{{--          </div>--}}
        </div>
      </div>
    </div>
  </div>
@endsection


@section('js')
@endsection


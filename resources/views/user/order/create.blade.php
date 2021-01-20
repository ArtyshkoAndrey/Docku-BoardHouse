@extends('user.layouts.app')
@section('title', 'Создание заказа')

@section('style')
  <style>
  </style>
@endsection

@section('content')
  <div class="container mt-2 order-create-page">
    <div class="row justify-content-center flex-column-reverse flex-md-row">
      <div class="col-12 col-md-7">
        <div class="row">
          <div class="col-12 mb-4">
            <p class="h4 title">Адрес доставки</p>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <div class="form-outline">
              <input type="text" id="country" name="country" class="form-control"/>
              <label class="form-label" for="country">Страна<span class="required">*</span></label>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <div class="form-outline">
              <input type="text" id="city" name="city" class="form-control"/>
              <label class="form-label" for="city">Город<span class="required">*</span></label>
            </div>
          </div>
          <div class="col-12 mb-5">
            <div class="form-outline">
              <input type="text" id="address" name="address" class="form-control"/>
              <label class="form-label" for="address">Точный адрес<span class="required">*</span></label>
            </div>
          </div>

          <div class="col-12 mb-4">
            <p class="h4 title">Контактные данные</p>
          </div>
          <div class="col-12 mb-3">
            <div class="form-outline">
              <input type="text" id="name" name="name" class="form-control"/>
              <label class="form-label" for="name">ФИО<span class="required">*</span></label>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-3">
            <div class="form-outline">
              <input type="email" id="email" name="email" class="form-control"/>
              <label class="form-label" for="email">E-mail<span class="required">*</span></label>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-5">
            <div class="form-outline">
              <input type="text" id="phone" name="phone" class="form-control"/>
              <label class="form-label" for="phone">Телефон<span class="required">*</span></label>
            </div>
          </div>

          <div class="col-12 mb-4">
            <p class="h4 title">Доставка</p>
          </div>
          <div class="col-12 mb-3">
            <div class="choosable-field active">
              <div class="row">
                <div class="col-8 d-flex flex-column">
                  <span class="title">Самовывоз из магазина</span>
                  <span class="description">Закажите онлайн и заберите в нашем магазине</span>
                </div>
                <div class="col-4 d-flex justify-content-end">
                  <span class="price">0 тг.</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mb-5">
            <div class="choosable-field">
              <div class="row">
                <div class="col-8 d-flex flex-column">
                  <span class="title">Стандартная доставка</span>
                  <span class="description">Доставка осуществляется от 4 до 7 дней сервисом Kaz Post</span>
                </div>
                <div class="col-4 d-flex justify-content-end">
                  <span class="price">1000 тг.</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 mb-4">
            <p class="h4 title">Оплата</p>
          </div>
          <div class="col-12 mb-3">
            <div class="choosable-field active">
              <div class="row">
                <div class="col-8 d-flex flex-column">
                  <span class="title">Оплата при получении</span>
                  <span class="description">Оплатите курьеру или в магазине после получения</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mb-5">
            <div class="choosable-field">
              <div class="row">
                <div class="col-8 d-flex flex-column">
                  <span class="title">Оплатить онлайн</span>
                  <span class="description">Оплатите онлайн любым удобным способом через сервис cloud payments</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-dark complete" disabled>Завершить и перейти к оплате</button>
      </div>
      <div class="col-12 col-md-5">
        <div class="row">
          <div class="col-12 justify-content-end d-flex mb-3 mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none" v-if="!$store.state.auth" style="font-size: .9em;">Войдите в аккаунт,
              чтобы оплачивать быстрее</a>
          </div>
          <div class="col-12 mb-2" :class="$store.state.auth ? 'mt-3' : null">
            <div class="order-results">
              <div class="row">
                <div class="col-12">
                  <span>Сумма покупок</span>
                  <span>@{{ $cost($store.getters.priceAmount) }} @{{ $store.state.currency.symbol }}</span>
                </div>
                <div class="col-12">
                  <span>Доставка</span>
                  <span>0 тг.</span>
                </div>
                <div class="col-12">
                  <span>Скидка</span>
                  <span>- 10 000 тг.</span>
                </div>
                <div class="col-12">
                  <span>Итог заказа</span>
                  <span class="font-weight-bold">400 000 тг.</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="form-outline">
              <input type="text" id="promocode" name="promocode" class="form-control" />
              <label class="form-label" for="promocode">Введите промокод (при наличии)</label>
            </div>
          </div>
          <div class="col-12 mb-5">
            <button class="btn btn-dark d-block w-100 mt-2 py-3 promocode-button">Активировать промокод</button>
          </div>

          <div class="col-12">
            <div class="row">
              <div class="col-12 mb-3">
                <span class="h5 title">Позиции заказа</span>
              </div>

              <div class="col-12" v-if="!cartLoader">
                <div class="row">
                  <div class="col-12 mb-3" v-for="product in productsCart">
                    <div class="row">
                      <div class="col-3">
                        <img :src="product.thumbnail_jpg" :alt="product.title" class="w-100" style="object-fit: cover">
                      </div>
                      <div class="col-9 d-flex flex-column justify-content-around pl-0"
                           style="border-bottom: 1px solid #E9EAEC;">
                        <span style="font-weight: 500;">GNU Klassy by Kaitlyn Farrington</span>
                        <span class="font-weight-bold">
                          @{{ $cost((product.on_sale ? product.price_sale : product.price) * $store.state.currency.ratio * product.item.amount) }} @{{ $store.state.currency.symbol }}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12" v-else>
                <div class="row justify-content-center">
                  <div class="col-auto">
                    <div class="spinner-border" role="status">
                      <span class="visually-hidden">Loading...</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script>
  $('#phone').mask('+7 (000) 000-00-00');
</script>
@endsection

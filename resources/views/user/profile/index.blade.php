@extends('user.layouts.app')
@section('title', 'Личный кабинет')

@section('content')

  <section class="container-fluid py-5" id="profile">
    <div class="card rounded-0 px-0">
      <div class="card-body px-0 py-0 rounded-0">
        <div class="row mx-0">
          <div class="col-md-3 bg-gray m-0 p-0">
            <div class="nav flex-column nav-pills h-100 m-0" role="tablist" aria-orientation="vertical">
              <a class="nav-link active border-0 rounded-0 py-4" href="#" aria-selected="true"><i class="fal fa-user pr-1"></i> Мой профиль</a>
              <a class="nav-link border-0 rounded-0 py-4" href="#" aria-selected="true"><i class="fal fa-tasks pr-1"></i> Мои заказы</a>
            </div>
          </div>
          <div class="col-md-9 p-4">
            <div class="row">
              <div class="col-12">
                <h3 class="font-weight-bold">Мой профиль</h3>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-3">
                <img src="{{ asset('images/user-photo.JPG') }}" class="img-fluid w-100 px-4 px-md-0" alt="...">
                <form action="" method="POST" id="form-photo" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="file" id="photo" name="photo" size="chars" accept="image/jpeg,image/png" style="visibility: hidden">
                  <button type="button" class="btn btn-dark position-absolute" id="add-photo">
                    <i class="fal fa-camera"></i>
{{--                    ТУТ икнока камеры--}}
                  </button>
                </form>
              </div>
              <div class="col-md-9 pl-md-5 pl-0 px-3 mt-4 mt-md-0">
                <h4 class="font-weight-bold">Артышко Андрей</h4>
                <p class="font-weight-light mb-0">Россия, Красноярск Горького 24 кв.2 25 660099</p>
                <p class="font-weight-light mb-0">Валюта: Американский доллар</p>
                <p class="font-weight-light mb-0">89029634366</p>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-4 px-3 px-md-2">
                <div class="row">
                  <div class="col-12">
                    <h4 class="font-weight-bold">Сменить пароль</h4>
                  </div>
                  <div class="col-12">
                    <form action="#" method="POST">
                      @csrf
                      @method('PUT')
                      <input type="password" name="password" class="form-control mb-4 rounded-0" placeholder="Новый пароль">
                      <input type="password" name="password_confirmation" class="form-control mb-4 rounded-0" placeholder="Повторите пароль">
                      <button type="submit" class="btn btn-dark m-0 rounded-0">Сохранить</button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8 px-3 px-md-2 mt-4 mt-md-0">
                <div class="row">
                  <div class="col-12">
                    <h4 class="font-weight-bold">Настройки профиля</h4>
                  </div>
                  <div class="col-12">
                    <form action="#" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <input type="text" name="first_name" class="form-control mb-4 rounded-0" placeholder="ФИО" value="" required>
                        </div>

                        <div class="col-md-6 col-12">
                          <input type="text" class="form-control mb-4 rounded-0" name="contact_phone" placeholder="Номер телефона" value="" required>
                        </div>

                        <div class="col-md-6 col-12">
                          <input type="email" class="form-control mb-4 rounded-0" name="email" placeholder="Email" value="" required>
                        </div>
                        <div class="col-md-6 col-12">
                          <select class="form-control mb-4 rounded-0" name="currency" placeholder="Валюта">
                            <option selected value="1">Тенге</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-12 mb-4">
                          <select id="country" name="country" class="rounded-0 w-100 h-100 form-control">
                              <option value="1" selected>Россия</option>
                          </select>
                        </div>
                        <div class="col-md-6 col-12 mb-4">
                          <select id="city" name="city" class="w-100 h-100 form-control rounded-0">
                            <option value="1" selected>Красноярск</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <input type="text" class="form-control mb-0 rounded-0" name="street" placeholder="Улица, индекс" value="" required>
                          <small class="form-text text-muted">Пример: ул. Ленина, 111 кв. 666, 143080 (индекс)</small>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-dark m-0 rounded-0">Сохранить</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('js')

@endsection

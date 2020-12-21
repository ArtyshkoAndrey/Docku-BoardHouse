<div class="header">
  <nav class="navbar navbar-expand">
    <div class="container">
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-center align-items-center w-100">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="d-none d-lg-block">Тенге (₸)</span>
              <span class="d-block d-lg-none">KZT</span>
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Тенге (₸)</a></li>
              <li><a class="dropdown-item" href="#">Русский рубль (₽)</a></li>
            </ul>
          </li>
          <li class="nav-item d-none d-xl-flex">
            <a class="d-block nav-link">+7 (747) 556-23-83</a>
          </li>
          <a class="navbar-brand mx-auto" href="#">
            <img src="{{ asset('images/logo.svg') }}" alt="">
          </a>
          <li class="d-none d-lg-flex">
            <a class="nav-link" href="#">info@dockuboardhouse.com</a>
          </li>
          <li class="nav-item icon">
            <a class="nav-link" href="#">
              <i class="bx bx-sm bx-search"></i>
            </a>
          </li>
          <li class="nav-item icon dropdown">
            <a
              class="nav-link"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bx bx-sm bx-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <img class="rounded-circle"
                       src="{{ asset('images/user-photo.jpg') }}"
                       style="width: 25px; height: 25px; margin-right: 1em;"/>
                  <span>Артышко Андрей</span>
                </a>
              </li>
              <li><a class="dropdown-item" href="#">Войти</a></li>
              <li><a class="dropdown-item" href="#">Зарегистрироваться</a></li>
            </ul>
          </li>
          <li class="nav-item icon dropdown">
            <a
              class="nav-link"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bx bx-sm bx-cart"></i>
              <span class="badge rounded-pill badge-notification bg-white text-black">14</span>
            </a>
            <div class="dropdown-menu full-height dropdown-menu-end" aria-labelledby="navbarDropdown">

              <div class="row">
                <div class="col-3 col-sm-2">
                  <img src="{{ asset('images/product.png') }}" alt="" class="img-fluid pb-2">
                </div>
                <div class="col-9 col-sm-10 border-bottom">
                  <div class="row align-items-center justify-content-between h-100">
                    <div class="col-12 col-sm-6">
                      <p class="m-0">Резиновые сапоги Maximo</p>
                    </div>
                    <div class="col-auto ml-auto font-weight-bolder">
                      <p class="m-0">6 000 ₸</p>
                    </div>
                    <div class="col-2 d-flex justify-content-around align-items-center">
                      <button type="button" class="btn btn-dark cart-button">
                        <i class="bx bx-minus"></i>
                      </button>
                      <p id="cart-item-amount-1" class="mx-2 my-auto">1</p>
                      <button type="button" class="btn btn-dark cart-button">
                        <i class="bx bx-plus"></i>
                      </button>
                    </div>
                    <div class="col-2">
                      <button type="button" name="submit" class="p-0 btn bg-transparent shadow-0 border-0" style="color: #DE6D2D">
                        <i class="bx bxs-trash bx-sm"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-3 col-sm-2">
                  <img src="{{ asset('images/product.png') }}" alt="" class="img-fluid pb-2">
                </div>
                <div class="col-9 col-sm-10 border-bottom">
                  <div class="row align-items-center justify-content-between h-100">
                    <div class="col-12 col-sm-6">
                      <p class="m-0">Резиновые сапоги Maximo</p>
                    </div>
                    <div class="col-auto ml-auto font-weight-bolder">
                      <p class="m-0">6 000 ₸</p>
                    </div>
                    <div class="col-2 d-flex justify-content-around align-items-center">
                      <button type="button" class="btn btn-dark cart-button">
                        <i class="bx bx-minus"></i>
                      </button>
                      <p id="cart-item-amount-2" class="mx-2 my-auto">1</p>
                      <button type="button" class="btn btn-dark cart-button">
                        <i class="bx bx-plus"></i>
                      </button>
                    </div>
                    <div class="col-2">
                      <button type="button" name="submit" class="p-0 btn bg-transparent shadow-0 border-0" style="color: #DE6D2D">
                        <i class="bx bxs-trash bx-sm"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row align-items-center justify-content-between mt-3">
                <div class="col-6">
                  <a href="#" class="btn btn-dark">Перейти в корзину</a>
                </div>
                <div class="col-6" style="text-align: right;">
                  <p class="h6 font-weight-bold">Итого: 20 000 ₸</p>
                  <a href="javascript:;" class="text-decoration-none" style="color: #DE6D2D">Очистить корзину</a>
                </div>
              </div>
            </div>
            {{--          <ul class="dropdown-menu full-height dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
            {{--            <li><a class="dropdown-item" href="#">Action</a></li>--}}
            {{--            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
            {{--            <li><hr class="dropdown-divider" /></li>--}}
            {{--            <li>--}}
            {{--              <a class="dropdown-item" href="#">Something else here</a>--}}
            {{--            </li>--}}
            {{--          </ul>--}}
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr>
  <div class="container search">
    <form action="">
      @csrf
      <div class="input-group">
        <div class="form-outline">
          <i class="bx bx-sm bx-search"></i>
          <input type="text" id="search" name="search" class="form-control" />
          <label class="form-label" for="search">Что-то искали?</label>
        </div>
        <button class="btn btn-dark font-weight-light">Найти</button>
        <a href="#">Закрыть</a>
      </div>
{{--      <div class="input-group mb-3">--}}
{{--        <label class="input-group-text">--}}
{{--          <i class="bx bx-search"></i>--}}
{{--        </label>--}}
{{--        <input--}}
{{--          type="text"--}}
{{--          class="form-control"--}}
{{--          placeholder="Что-то искали?"--}}
{{--          aria-label="Recipient's username"--}}
{{--          aria-describedby="button-addon2"--}}
{{--        />--}}
{{--        <button--}}
{{--          class="btn btn-dark font-weight-light"--}}
{{--          type="button"--}}
{{--          id="button-addon2"--}}
{{--          data-mdb-ripple-color="dark"--}}
{{--        >--}}
{{--          Найти--}}
{{--        </button>--}}
{{--        <a class="d-flex" href="#">Закрыть</a>--}}
{{--      </div>--}}
    </form>
  </div>
{{--  <nav class="navbar navbar-expand category-menu">--}}
{{--    <div class="container">--}}
{{--      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">--}}
{{--        <ul class="navbar-nav justify-content-md-center align-items-center">--}}
{{--          <li class="nav-item dropdown">--}}
{{--            <a--}}
{{--              class="nav-link dropdown-toggle"--}}
{{--              href="#"--}}
{{--              id="navbarDropdown"--}}
{{--              role="button"--}}
{{--              data-mdb-toggle="dropdown"--}}
{{--              aria-expanded="false"--}}
{{--            >--}}
{{--              <span>Сноубординг</span>--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--              <div class="row">--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Сноубординг1</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Начинающим</a>--}}
{{--                  <a class="item" href="#">Любителям</a>--}}
{{--                  <a class="item" href="#">Профессионалам</a>--}}
{{--                  <a class="item" href="#">Все сноуборды</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Ботинки для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Крепления для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Защита</span>--}}
{{--                  <a class="item" href="#">Шлемы</a>--}}
{{--                  <a class="item" href="#">Защитные очки</a>--}}
{{--                  <a class="item" href="#">Защитное снаряжение</a>--}}
{{--                  <a class="item" href="#">Вся защита</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Еще какая-то категория</span>--}}
{{--                  <a class="item" href="#">Твой любимый товар</a>--}}
{{--                  <a class="item" href="#">А это тебе не понравиться</a>--}}
{{--                  <a class="item" href="#">Это полнейшая помойка</a>--}}
{{--                  <a class="item" href="#">Тут можно купить бухло</a>--}}
{{--                  <a class="item" href="#">А это от бухла</a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </li>--}}
{{--          <li class="nav-item dropdown">--}}
{{--            <a--}}
{{--              class="nav-link dropdown-toggle"--}}
{{--              href="#"--}}
{{--              id="navbarDropdown"--}}
{{--              role="button"--}}
{{--              data-mdb-toggle="dropdown"--}}
{{--              aria-expanded="false"--}}
{{--            >--}}
{{--              <span>Крепления</span>--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--              <div class="row">--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Сноубординг2</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Начинающим</a>--}}
{{--                  <a class="item" href="#">Любителям</a>--}}
{{--                  <a class="item" href="#">Профессионалам</a>--}}
{{--                  <a class="item" href="#">Все сноуборды</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Ботинки для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Крепления для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Защита</span>--}}
{{--                  <a class="item" href="#">Шлемы</a>--}}
{{--                  <a class="item" href="#">Защитные очки</a>--}}
{{--                  <a class="item" href="#">Защитное снаряжение</a>--}}
{{--                  <a class="item" href="#">Вся защита</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Еще какая-то категория</span>--}}
{{--                  <a class="item" href="#">Твой любимый товар</a>--}}
{{--                  <a class="item" href="#">А это тебе не понравиться</a>--}}
{{--                  <a class="item" href="#">Это полнейшая помойка</a>--}}
{{--                  <a class="item" href="#">Тут можно купить бухло</a>--}}
{{--                  <a class="item" href="#">А это от бухла</a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </li>--}}
{{--          <li class="nav-item dropdown">--}}
{{--            <a--}}
{{--              class="nav-link dropdown-toggle"--}}
{{--              href="#"--}}
{{--              id="navbarDropdown"--}}
{{--              role="button"--}}
{{--              data-mdb-toggle="dropdown"--}}
{{--              aria-expanded="false"--}}
{{--            >--}}
{{--              <span>Одежда</span>--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--              <div class="row">--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Сноубординг3</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Начинающим</a>--}}
{{--                  <a class="item" href="#">Любителям</a>--}}
{{--                  <a class="item" href="#">Профессионалам</a>--}}
{{--                  <a class="item" href="#">Все сноуборды</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Ботинки для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Крепления для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Защита</span>--}}
{{--                  <a class="item" href="#">Шлемы</a>--}}
{{--                  <a class="item" href="#">Защитные очки</a>--}}
{{--                  <a class="item" href="#">Защитное снаряжение</a>--}}
{{--                  <a class="item" href="#">Вся защита</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Еще какая-то категория</span>--}}
{{--                  <a class="item" href="#">Твой любимый товар</a>--}}
{{--                  <a class="item" href="#">А это тебе не понравиться</a>--}}
{{--                  <a class="item" href="#">Это полнейшая помойка</a>--}}
{{--                  <a class="item" href="#">Тут можно купить бухло</a>--}}
{{--                  <a class="item" href="#">А это от бухла</a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </li>--}}
{{--          <li class="nav-item dropdown">--}}
{{--            <a--}}
{{--              class="nav-link dropdown-toggle"--}}
{{--              href="#"--}}
{{--              id="navbarDropdown"--}}
{{--              role="button"--}}
{{--              data-mdb-toggle="dropdown"--}}
{{--              aria-expanded="false"--}}
{{--            >--}}
{{--              <span>Защита</span>--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--              <div class="row">--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Сноубординг4</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Начинающим</a>--}}
{{--                  <a class="item" href="#">Любителям</a>--}}
{{--                  <a class="item" href="#">Профессионалам</a>--}}
{{--                  <a class="item" href="#">Все сноуборды</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Ботинки для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Крепления для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Защита</span>--}}
{{--                  <a class="item" href="#">Шлемы</a>--}}
{{--                  <a class="item" href="#">Защитные очки</a>--}}
{{--                  <a class="item" href="#">Защитное снаряжение</a>--}}
{{--                  <a class="item" href="#">Вся защита</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Еще какая-то категория</span>--}}
{{--                  <a class="item" href="#">Твой любимый товар</a>--}}
{{--                  <a class="item" href="#">А это тебе не понравиться</a>--}}
{{--                  <a class="item" href="#">Это полнейшая помойка</a>--}}
{{--                  <a class="item" href="#">Тут можно купить бухло</a>--}}
{{--                  <a class="item" href="#">А это от бухла</a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </li>--}}
{{--          <li class="nav-item dropdown">--}}
{{--            <a--}}
{{--              class="nav-link dropdown-toggle"--}}
{{--              href="#"--}}
{{--              id="navbarDropdown"--}}
{{--              role="button"--}}
{{--              data-mdb-toggle="dropdown"--}}
{{--              aria-expanded="false"--}}
{{--            >--}}
{{--              <span>Аксессуары</span>--}}
{{--            </a>--}}

{{--            <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--              <div class="row">--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Сноубординг5</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Начинающим</a>--}}
{{--                  <a class="item" href="#">Любителям</a>--}}
{{--                  <a class="item" href="#">Профессионалам</a>--}}
{{--                  <a class="item" href="#">Все сноуборды</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Ботинки для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Крепления для сноуборда</span>--}}
{{--                  <a class="item" href="#">Для мужчин</a>--}}
{{--                  <a class="item" href="#">Для женщин</a>--}}
{{--                  <a class="item" href="#">Для детей</a>--}}
{{--                  <a class="item" href="#">Step On</a>--}}
{{--                  <a class="item" href="#">Все ботинки</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Защита</span>--}}
{{--                  <a class="item" href="#">Шлемы</a>--}}
{{--                  <a class="item" href="#">Защитные очки</a>--}}
{{--                  <a class="item" href="#">Защитное снаряжение</a>--}}
{{--                  <a class="item" href="#">Вся защита</a>--}}
{{--                </div>--}}
{{--                <div class="col col-md-4 col-lg-3 flex-column">--}}
{{--                  <span class="font-weight-bold">Еще какая-то категория</span>--}}
{{--                  <a class="item" href="#">Твой любимый товар</a>--}}
{{--                  <a class="item" href="#">А это тебе не понравиться</a>--}}
{{--                  <a class="item" href="#">Это полнейшая помойка</a>--}}
{{--                  <a class="item" href="#">Тут можно купить бухло</a>--}}
{{--                  <a class="item" href="#">А это от бухла</a>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </li>--}}
{{--        </ul>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </nav>--}}
  <hr>
</div>

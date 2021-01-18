<div class="header {{ $theme_menu ?? 'dark-menu' }}">
  <nav id="main-menu" class="navbar navbar-expand">
    <div class="container">
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-center w-100">
          <li class="nav-item dropdown mr-auto">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="">@{{ $store.state.currency.short_name ?? 'Загрузка' }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach(\App\Models\Currency::all() as $currency)
                <li>

                  <button
                    @click="$store.dispatch('set_currency', { currency: {{$currency}} })"
                    class="dropdown-item"
                    v-bind:class="$store.state.currency.id === {{ $currency->id }} ? 'active' : '' ">
                      {{ $currency->name }} ({{ $currency->symbol }})
                  </button>

                </li>
              @endforeach
            </ul>
          </li>
          <li class="nav-item d-none d-xl-flex">
            <a href="tel:" class="d-block nav-link">+7 (747) 556-23-83</a>
          </li>
          <li class="nav-item d-none d-md-flex mx-auto">
            <a class="" href="{{ route('index') }}">
              <img class="light-logo" src="{{ asset('images/logo.svg') }}" alt="logo">
              <img class="dark-logo" src="{{ asset('images/logo-dark.svg') }}" alt="logo">
            </a>
          </li>
          <li class="d-none d-lg-flex">
            <a class="nav-link" href="#">info@dockuboardhouse.com</a>
          </li>
          <li class="nav-item icon ml-auto ml-md-0">
              <a class="nav-link" onclick="toggleSearch()">
                <i class="bx bx-sm bx-search"></i>
              </a>
            </li>
          <li class="nav-item icon dropdown">
              <a
                class="nav-link"
                href="#"
                id="user-dropdown"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bx bx-sm bx-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="user-dropdown">
                <div class="row">
                  <div class="col-12">
                    @auth
                      <div class="row">
                        <a href="#" class="d-flex dropdown-item">
                          <div class="col-2 d-flex align-items-center justify-content-center">
                            <img class="rounded-circle"
                                 src="{{ asset('images/user-photo.jpg') }}"
                                 style="width: 25px; height: 25px;" alt="logo"/>
                          </div>
                          <div class="col-auto mx-2">
                            Артышко Андрей
                          </div>
                        </a>
                      </div>
                      <div class="row">
                        <a href="{{ route('admin.index') }}" class="d-flex dropdown-item">
                          <div class="col-2 d-flex align-items-center justify-content-center">
                            <i class="bx bx-sm bxs-dashboard"></i>
                          </div>
                          <div class="col-auto mx-2">
                            Администитивная панель
                          </div>
                        </a>
                      </div>
                      <div class="row">
                        <a href="#" class="d-flex dropdown-item" onclick="event.preventDefault();$('#logout').submit()">
                          <div class="col-2 d-flex align-items-center justify-content-center">
                            <i class="bx bx-sm bx-log-out"></i>
                          </div>
                          <div class="col-auto mx-2">
                            Выйти
                          </div>
                        </a>
                        <form action="{{ route('logout') }}" id="logout" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    @else
                      <div class="row">
                        <a href="{{ route('login') }}" class="d-flex dropdown-item">
                          <div class="col-2 d-flex align-items-center justify-content-center">
                            <i class="bx bx-sm bx-user"></i>
                          </div>
                          <div class="col-auto mx-2">
                            Войти
                          </div>
                        </a>
                      </div>
                      <div class="row">
                        <a href="{{ route('register') }}" class="d-flex dropdown-item">
                          <div class="col-2 d-flex align-items-center justify-content-center">
                            <i class="bx bx-sm bx-plus-circle"></i>
                          </div>
                          <div class="col-auto mx-2">
                            Зарегистрироваться
                          </div>
                        </a>
                      </div>
                      @endauth
                  </div>
                </div>
              </div>
            </li>
          <li class="nav-item icon dropdown">
            <a
              class="nav-link"
              href="#"
              id="cart-dropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bx bx-sm bx-cart"></i>
              <span class="badge rounded-pill badge-notification bg-white text-black">14</span>
            </a>
            <div class="dropdown-menu full-height dropdown-menu-end" aria-labelledby="cart-dropdown">

              <div class="row mt-2" v-for="i in 3">
                <div class="col-3 col-sm-2 d-flex align-items-center">
                  <img src="{{ asset('images/product.jpg') }}" alt="" class="img-fluid pb-2">
                </div>
                <div class="col-9 col-sm-10 border-bottom">
                  <div class="row align-items-center justify-content-between h-100 pb-2 pb-md-0">
                    <div class="col-12 col-sm-6">
                      <p class="m-0 font-weight-bold">Резиновые сапоги Maximo</p>
                    </div>
                    <div class="col-12 col-sm-6 d-flex">
                      <div class="col-auto ml-auto d-flex align-items-center">
                        <p class="m-0">6 000 ₸</p>
                      </div>
                      <div class="col-4 d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-dark cart-button">
                          <i class="bx bx-minus"></i>
                        </button>
                        <p id="cart-item-amount-1" class="mx-2 my-auto">1</p>
                        <button type="button" class="btn btn-dark cart-button">
                          <i class="bx bx-plus"></i>
                        </button>
                      </div>
                      <div class="col-2 d-flex align-items-center">
                        <button type="button" name="submit" class="p-0 btn bg-transparent shadow-0 border-0" style="color: #DE6D2D">
                          <i class="bx bxs-trash bx-sm"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row align-items-center flex-wrap-reverse justify-content-between mt-3">
                <div class="col-12 col-md-6">
                  <a href="#" class="btn btn-dark w-100">Перейти в корзину</a>
                </div>
                <div class="col-12 col-md-6 d-flex d-md-block justify-content-between mb-3 mb-md-0" style="text-align: right;">
                  <div class="col-8 col-md-12 d-flex justify-content-end align-items-center p-0">
                    <p class="h6 font-weight-bold">Итого: 1 220 000 ₸</p>
                  </div>
                  <div class="col-4 col-md-12">
                    <a href="javascript:;" class="text-decoration-none" style="color: #DE6D2D">Очистить корзину</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr>
  <div class="container search hide">
    <form action="{{ route('product.search') }}" method="GET">
      <div class="input-group">
        <div class="form-outline">
          <i class="d-block d-md-none bx bx bx-search"></i>
          <i class="d-none d-md-block bx bx-sm bx-search"></i>
          <input autocomplete="none" type="text" id="search" name="q" class="form-control" />
          <label class="form-label" for="search">Что-то искали?</label>
        </div>
        <button class="btn btn-dark font-weight-light">Найти</button>
        <a onclick="toggleSearch()">Закрыть</a>
      </div>
    </form>
  </div>

  <nav class="navbar navbar-expand category-menu">
    <div class="container-fluid container-md w-100">
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-center w-100">
          <li class="nav-item ml-auto">
            <a href="{{ route('index') }}" class="nav-link">Главная</a>
          </li>
          @foreach($categories = \App\Models\Category::whereDoesntHave('parents')->get() as $index => $category)

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <span>{{ $category->name }}</span>
              </a>

              <div class="triangle" aria-labelledby="navbarDropdown"></div>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="container">

                  <div class="row">

                    @foreach($category->child as $childCategory)
                      <div class="col col-md-4 col-lg-3 flex-column" >
                        <a class="item font-weight-bold text-black" href="{{ route('product.all', ['category' => $childCategory->id]) }}">{{ $childCategory->name }}</a>
                        @foreach($childCategory->child as $thirdCategory)
                          <a class="item" href="{{ route('product.all', ['category' => $thirdCategory->id]) }}">{{ $thirdCategory->name }}</a>
                        @endforeach
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </li>

          @endforeach

          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <span>Sale</span>
            </a>

            <div class="triangle" aria-labelledby="navbarDropdown"></div>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="container">

                <div class="row">

                  @foreach($category->child as $childCategory)
                    <div class="col col-md-4 col-lg-3 flex-column">
                      @foreach($childCategory->child as $thirdCategory)
                        <a class="item" href="{{ route('product.all', ['category' => $thirdCategory->id]) }}">{{ $thirdCategory->name }}</a>
                      @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown mr-auto">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <span>Бренды</span>
            </a>

            <div class="triangle" aria-labelledby="navbarDropdown"></div>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="container">

                <div class="row">

                  @foreach($category->child as $childCategory)
                    <div class="col col-md-4 col-lg-3 flex-column" >
                      @foreach($childCategory->child as $thirdCategory)
                        <a class="item" href="{{ route('product.all', ['category' => $thirdCategory->id]) }}">{{ $thirdCategory->name }}</a>
                      @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr>
</div>

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
            <li><a class="dropdown-item" href="#">Артышко Андрей</a></li>
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
                <div class="row align-items-center h-100">
                  <div class="col-12 col-sm-6">
                    <p class="m-0">Резиновые сапоги Maximo</p>
                  </div>
                  <div class="col-auto ml-auto font-weight-bolder">
                    <p class="m-0">6 000 ₸</p>
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
                <div class="row align-items-center h-100">
                  <div class="col-12 col-sm-6">
                    <p class="m-0">Резиновые сапоги Maximo</p>
                  </div>
                  <div class="col-auto ml-auto font-weight-bolder">
                    <p class="m-0">6 000 ₸</p>
                  </div>
                  <div class="col-2">
                    <button type="button" name="submit" class="p-0 btn bg-transparent shadow-0 border-0" style="color: #DE6D2D">
                      <i class="bx bxs-trash bx-sm"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row justify-content-between mt-3">
              <div class="col-auto">
                <a href="#" class="btn btn-dark">Перейти в корзине</a>
              </div>
              <div class="col-auto">
                <p class="h6 font-weight-normal">Итого: 20 000 ₸</p>
                <a href="javascript:;" class="text-decoration-none">Очистить корзину</a>
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

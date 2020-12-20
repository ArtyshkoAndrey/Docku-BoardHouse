@extends('user.layouts.app')

@section('content')
  <div class="container-fluid d-flex align-items-center">
    <div class="row w-100 d-flex justify-content-center">
      <div class="col-lg-5 col-md-6 col-12">
        <div class="row justify-content-center">
          <div class="col-md-3 col-6">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="img-fluid mb-5 mx-auto d-block">
          </div>
        </div>
        <div class="card rounded-0">
          <div class="row m-0 flex-nowrap text-center">
            <div class="col px-5 py-4 font-weight-bolder d-flex justify-content-center align-items-center"><i class="bx bx-user"></i>Вход</div>
            <div class="col bg-gray px-4 px-md-5 py-4 font-weight-bolder link-inverse-login-register">
              <a href="{{ route('register') }}" class="text-decoration-none d-flex justify-content-center align-items-center">
                <i class="bx bx-plus-circle"></i>Регистрация</a>
            </div>
          </div>
          <div class="card-body p-4">
            <div class="row">
              <div class="col-12 mt-3">
                <h5 class="text-center">Укажите свой логин и пароль</h5>
              </div>
              <div class="col-12 mt-3">
                <form action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="email">Email</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Пароль</label>
                  </div>
                  <button id="submitter" class="btn btn-dark w-100 rounded-0 d-block mt-3 ml-auto">Войти</button>
                </form>
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
    let checker = {
      password: false,
      email: false
    }
    $( "input" ).focus(function() {
      $(this).parent().addClass('focus')
    });
    $('input').focusout(function() {
      $(this).parent().removeClass('focus')
    });

    for (let key in checker) {
      $('#'+key).on('keydown keyup change', function () {
        let charLength = $(this).val().length;
        if (charLength > 3) {
          checker[key] = true
          console.log(disabled(checker))
          if(disabled(checker)) {
            $('#submitter').attr('disabled', false)
          } else {
            $('#submitter').attr('disabled', true)
          }
        }
      })
    }

    function disabled(checker) {
      let v = true
      for (let key in checker) {
        if (!checker[key]) {
          v = false
        }
      }
      return v
    }
  </script>
@endsection

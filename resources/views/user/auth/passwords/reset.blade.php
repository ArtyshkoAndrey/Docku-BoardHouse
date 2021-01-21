@extends('user.layouts.app')

@section('content')
{{--  TODO: Backend part --}}
  <div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="row w-100 d-flex justify-content-center">
      <div class="col-lg-5 col-md-6 col-12">
        <div class="row justify-content-center">
          <div class="col-md-5 col-6">
            <img src="{{ asset('images/logo-dark.svg') }}" alt="logo" class="img-fluid mb-5 mx-auto d-block logo">
          </div>
        </div>
        <div class="card rounded-0">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-12 mt-3">
                <h5 class="text-center font-weight-light">Смена пароля</h5>
              </div>
              <div class="col-12 mt-3">
                <form action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control" />
                    <label class="form-label" for="email">Email</label>
                  </div>
                  <div class="form-outline form-password mb-4">
                    <input type="password" id="password" name="password" class="form-control" />
                    <label class="form-label" for="password">Пароль</label>
                    <button type="button" class="hide-show-btn" onclick="passwordTypeToggle(this, 'password')"><i class="bx bxs-lock-open-alt"></i></button>
                  </div>
                  <div class="form-outline form-password mb-4">
                    <input type="password" id="password-confirm" name="password-confirm" class="form-control" />
                    <label class="form-label" for="password-confirm">Повторите пароль</label>
                    <button type="button" class="hide-show-btn" onclick="passwordTypeToggle(this, 'password-confirm')"><i class="bx bxs-lock-open-alt"></i></button>
                  </div>
                  <button id="submitter" class="btn btn-dark w-100 d-block mt-3" style="height: 43px;">Сменить пароль</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}
{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}
{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

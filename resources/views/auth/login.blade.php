@extends('layouts.app')

@section('content')

  <div class="col-lg-6 offset-md-3">

    <div class="p-5">

      <div class="text-center" style="margin-top: 30px;">
        <h1 class="h4 text-gray-900 mb-4">Login Form</h1>
      </div>

      <form class="user" method="POST" action="{{ route('login') }}">

        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus placeholder="enter email">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input id="password" type="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="enter password">

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
          <div class="custom-control custom-checkbox small">

            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="customCheck">Remember Me</label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>

        <hr>

      </form><!-- end of form -->

      <hr>

      <div class="text-center">
        @if (Route::has('password.request'))
            <a class="small" href="{{ route('password.request') }}">
                Forgot Password?
            </a>
        @endif
      </div>

    </div><!-- end of p-5 -->

  </div><!-- end of col-lg-6 offset-md-3 -->

@endsection

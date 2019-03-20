@extends('layouts.app')

@section('content')

  <div class="col-lg-6 offset-md-3">

    <div class="p-5">

        <div class="text-center" style="margin-top: 30px;">
            <h1 class="h4 text-gray-900 mb-4">Registration Form</h1>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Register') }}
                        </button>
                </div>

            </form><!-- end of form -->

        </div><!-- end of card-body -->

    </div><!-- end of p-5 -->

  </div><!-- end of col-lg-6 offset-md-3 -->


@endsection

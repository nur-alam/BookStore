@extends('layouts.app')

@section('content')

    <div class="col-lg-6 offset-md-3" style="margin-bottom: 80px;">

        <div class="p-5">

            <div class="text-center" style="margin-top: 30px;">
                <h1 class="h4 text-gray-900 mb-4">Additional info</h1>
            </div>

            <form class="user" method="POST" action="{{ route('nidStore') }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <input id="address" type="text" class="form-control-user form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autofocus placeholder="enter address">

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="nid" type="text" class="form-control-user form-control{{ $errors->has('nid') ? ' is-invalid' : '' }}" name="nid" value="{{ old('nid') }}" autofocus placeholder="enter NID number">

                    @if ($errors->has('nid'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nid') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nid_image">Image</label>
                    <input id="nid_image" type="file"  class="form-control{{ $errors->has('nid_image') ? ' is-invalid' : '' }}" name="nid_image" value="{{ old('nid_image') }}" onchange="readImage(this);"  autofocus>

                    @if ($errors->has('nid_image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nid_image') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    @if(auth()->user()->nid_img)
                        <img src="{{ asset('/'.auth()->user()->nid_img) }}" id="previewimg" style="max-width: 200px; max-height: 200px;" alt="book image">
                    @else
                        <img src="" id="previewimg" alt="You have no nid image yet.">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    submit
                </button>

            </form><!-- end of form -->

        </div><!-- end of p-5 -->

    </div><!-- end of col-lg-6 offset-md-3 -->

@endsection

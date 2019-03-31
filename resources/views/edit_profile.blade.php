@extends('layouts.app')

@section('content')


<section id="public-profile" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>Profile <a href="{{route('reset_password')}}" style="font-size: 11px;margin-left: 100px;color: #333;">Change Password</a></h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                <div class="branch-details" style="background-color: #fff;">

                    <div class="panel panel-default">

                        <div class="card-body">

                            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">

                                @csrf

                                <table class="table" id="branch-details">

                                    <tr>
                                        <th class="branch-th">Name</th>
                                        <td>
                                            <input value="{{auth()->user()->name}}" type="text" name="name" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="branch-th">image</th>
                                        <td>
                                           <input id="image" type="file"  class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" onchange="readImage(this);"  autofocus>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="branch-th">image</th>
                                        <td>
                                           <img src="{{ asset('/'.auth()->user()->image) }}" id="previewimg" style="max-width: 200px; max-height: 200px;" alt="book image">
                                        </td>
                                    </tr>

                                </table>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <!-- <a href="{{route('profile.update')}}" class="btn btn-primary">Update</a> -->
                            </form>

                        </div>

                    </div>

                </div>

                </div>
            </div><!-- end of col-md-12 -->
        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of section  -->



@endsection

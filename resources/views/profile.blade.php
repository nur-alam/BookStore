@extends('layouts.app')

@section('content')


<section id="public-profile" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>Profile</h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                <div class="branch-details" style="background-color: #fff;">

                    <div class="panel panel-default">

                        <div class="card-body">
                            <table class="table" id="branch-details">

                                <tr>
                                    <th class="branch-th">Name</th>
                                    <td>{{auth()->user()->name}}</td>
                                </tr>
                                <tr>
                                    <th class="">Email</th>
                                    <td>{{auth()->user()->email}}</td>
                                </tr>
                                <tr>
                                    <th class="branch-th">Role</th>
                                    <td>{{auth()->user()->role}}</td>
                                </tr>
                                <tr>
                                    <th class="branch-th">image</th>
                                    <td>
                                        <img src="{{ asset('/'.auth()->user()->image) }}">
                                    </td>
                                </tr>

                            </table>

                            <a href="{{route('profile.edit')}}">
                                <div class="btn btn-primary">Edit Profile</div>
                            </a>

                        </div>

                    </div>

                </div>

                </div>
            </div><!-- end of col-md-12 -->
        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of section  -->



@endsection

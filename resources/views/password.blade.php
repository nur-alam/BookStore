@extends('layouts.app')

@section('content')


    <section id="public-profile" class="section_padding margin-from-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="section_title cat_programming_title">
                            <a href="">
                                <h5>Profile </h5>
                            </a>
                        </div>
                    </div>
                </div><!-- end of col-md-12 -->
                <div class="col-md-12">
                    <div class="row">

                        <div class="branch-details" style="background-color: #fff;">

                            <div class="panel panel-default">

                                <div class="card-body">
                                        <form action="{{route('changePassword')}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <table>
                                                <tr>
                                                    <td>
                                                            <strong>Old Password: </strong>
                                                    </td>
                                                    <td>
                                                            <input type="password" name="old_password" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                            <strong>New Password: </strong>
                                                    </td>
                                                    <td>
                                                            <input type="password" name="password" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                            <strong>New Password again: </strong>
                                                    </td>
                                                    <td>
                                                            <input type="password" name="password_confirmation" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td>
                                                            <button class="btn btn-primary form-control">Update Password</button>
                                                    </td>
                                                </tr>
                                            </table>

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

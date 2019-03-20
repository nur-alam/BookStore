@extends('layouts.admin-app')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Book details</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <!-- Content Row -->
    <div class="col-md-12">

        <div class="row">

            <div class="branch-details" style="background-color: #fff;">

                <div class="panel panel-default">

                    <div class="card-body">


                        <table class="table" id="branch-details">

                            <tr>
                                <th class="branch-th">Book Name</th>
                                <td>{{$book->name}}</td>
                            </tr>
                            <tr>
                                <th class="">Book Author</th>
                                <td>{{$book->author->name}}</td>
                            </tr>
                            <tr>
                                <th class="branch-th">Category</th>
                                <td>{{$book->category->name}}</td>
                            </tr>
                            <tr>
                                <th class="branch-th">Proce</th>
                                <td>{{$book->price}}</td>
                            </tr>
                            <tr>
                                <th class="branch-th">Description</th>
                                <td>{{$book->desc}}</td>
                            </tr>
                            <tr>
                                <th class="branch-th">Quantity</th>
                                <td>{{$book->quantity}}</td>
                            </tr>
                            <tr>
                                <th class="branch-th">image</th>
                                <td>
                                    <img src="{{ asset('/'.$book->image) }}">
                                </td>
                            </tr>

                        </table>

                        <a href="{{route('book.index')}}">
                            <div class="btn btn-primary">back</div>
                        </a>

                    </div>

                </div>

            </div>

        </div>	<!-- End of row -->

    </div><!-- End of col-md-12 -->



@endsection

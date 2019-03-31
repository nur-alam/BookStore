@extends('layouts.admin-app')

@section('content')



    <section id="BookDetails" class="section_padding margin-from-header">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="pull-left" style="margin-bottom: 30px;margin-top: 30px;">
                            <h5>Rent History</h5>
                        </div>
                    </div>
                </div><!-- end of col-md-12 -->

                <div class="col-md-12">
                    <div class="row">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="width:5%">No</th>
                                <th style="width:15%">User Details</th>
                                <th style="width:10%">status</th>
                                <th style="width:10%" class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @forelse($data['borrows'] as $order)
                                <tr>
                                    <td>
                                        {{++$i}}
                                    </td>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-4 hidden-xs">
                                                <img src="{{ asset(''.$order->user->image) }}" alt="..." style="max-width: 50px;max-height: 50px;" class="img-responsive"/>
                                            </div>
                                            <div class="col-sm-8">
                                                <h4 class="nomargin">{{$order->user->name}}</h4>
                                                <p>{{$order->user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">{{$order->status}}</td>
                                    <td data-th="Quantity">
                                        <a href="{{route('borrow_details',$order->id)}}" class="btn btn-info">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <h3>Rent is empty!</h3>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div><!-- end of col-md-12 -->



            </div><!-- end of row -->
        </div><!-- end of container -->
    </section><!-- end of section  -->


@endsection

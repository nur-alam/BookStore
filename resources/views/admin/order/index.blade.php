@extends('layouts.admin-app')

@section('content')



                <div class="col-md-12">
                    <div class="row">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;margin-right:50px;">Order list</h1>
                            <a class="btn" href="{{route('order.history')}}" style="font-wight:bold;">
                                Order Hisotry
                            </a>
                        </div>
                    </div>
                </div><!-- end of col-md-12 -->

                <div class="col-md-12">
                    <div class="">
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
                            @forelse($data['orders'] as $order)
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
                                        <a href="{{route('order_details',$order->id)}}" class="btn btn-info">
                                            Details
                                            {{--<i class="fa fa-trash-o"></i>--}}
                                        </a>
                                        <a href="{{route('order.destroy',$order->id)}}" class="btn btn-info">                                        
                                            <i class="fas fa-window-close"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <h3>Your order is empty!</h3>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>

                    </div>
                </div><!-- end of col-md-12 -->





@endsection

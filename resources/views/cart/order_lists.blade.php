@extends('layouts.app')

@section('content')

    <section id="BookDetails" class="section_padding margin-from-header">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="row">
                        <div class="" style="margin-bottom: 60px;">
                            <h5>Order Lists</h5>
                        </div>
                    </div>
                </div><!-- end of col-md-12 -->

                <div class="col-md-12">
                    <div class="row">
                        @include('layouts.success')
                        @include('layouts.errors')
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="width:50%">Book</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data['orders'] as $order)
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-4 hidden-xs">
                                                <img src="{{ asset(''.$order->book->image) }}" alt="..." style="max-width: 90px;max-height: 90px;" class="img-responsive"/>
                                            </div>
                                            <div class="col-sm-8">
                                                <h4 class="nomargin">{{$order->book->name}}</h4>
                                                <p>{{$order->book->author->name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">{{$order->book->price}}</td>
                                    <td data-th="Quantity">
                                            <input value="{{$order->quantity}}" class="form-control text-center">
                                    </td>
                                    <td data-th="Subtotal" class="text-center">{{$order->quantity*$order->book->price}}</td>
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
                            <tr class="visible-xs">
                                {{--<td class="text-center"><strong>Total {{$data['total']}}</strong></td>--}}
                            </tr>
                            <tr>
                                {{--<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>--}}
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total {{$data['total']}}</strong></td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div><!-- end of col-md-12 -->



            </div><!-- end of row -->
        </div><!-- end of container -->
    </section><!-- end of section  -->


@endsection

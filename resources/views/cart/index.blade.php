@extends('layouts.app')

@section('content')

<section id="BookDetails" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="" style="margin-bottom: 60px;">
                        <h5>Cart Details</h5>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->

            <div class="col-md-12">
                <div class="row">
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
                                    <div class="col-sm-4 hidden-xs"><img src="{{ asset(''.$order->book->image) }}" alt="..." style="max-width: 90px;ax-height: 90px;" class="img-responsive"/></div>
                                    <div class="col-sm-8">
                                        <h4 class="nomargin">{{$order->book->name}}</h4>
                                        <p>{{$order->book->author->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price" style="font-weight: bold;">{{$order->book->price}}</td>
                            <td data-th="Quantity">
                                <input onchange="qty({{$order->id}})" id="qty_{{$order->id}}" value="{{$order->quantity}}" type="number" min="1" max="100" class="form-control text-center">
                            </td>
                            <td data-th="Subtotal" class="text-center" style="font-weight: bold;">{{$order->quantity*$order->book->price}}</td>
                            <td class="actions" data-th="">
                                {{--<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>--}}

                                <form action="{{ route('cart.destroy', $order->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td>
                                    <h3>Your cart is empty!</h3>
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
                            <td class="hidden-xs text-center" style="font-weight: bold;"><strong>Total {{$data['total']}}</strong></td>

                            <form action="{{route('placeorder')}}" method="post">
                                @csrf
                                @method('PUT')
                                <td>
                                    <button class="btn btn-success btn-block">
                                        Place Order
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div><!-- end of col-md-12 -->



        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of section  -->


@endsection

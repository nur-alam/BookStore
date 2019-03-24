@extends('layouts.app')

@section('content')

<section id="BookDetails" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="" style="margin-bottom: 60px;">
                        <h5>Your Borrow list</h5>
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
                            <th style="width:8%">Remove</th>
                            <th style="width:22%" class="text-center">Subtotal (20% off)</th>
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
                                <td class="actions" data-th="">
                                    {{--<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>--}}

                                    <form action="{{ route('borrow.destroy', $order->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                                <td data-th="Subtotal" class="text-center">{{$order->book->price*(20/100)}}</td>
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

                        </tr>
                        <tr>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total {{$data['total']}}</strong></td>

                            <form action="{{route('placeborrow')}}" method="post">
                                @csrf
                                @method('PUT')
                                <td>
                                    <button class="btn btn-success btn-block">
                                        Submit Borrow Request
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

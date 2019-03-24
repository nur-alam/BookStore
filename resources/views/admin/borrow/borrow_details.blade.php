@extends('layouts.admin-app')

@section('content')



    <div class="col-md-12">
        <div class="">
            <div class="" style="margin-bottom: 60px;">
                <h5>Order Details</h5>
            </div>
        </div>
    </div><!-- end of col-md-12 -->

    <div class="col-md-12">
        <div class="">

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
                @foreach($data['items'] as $item)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">
                                    <img src="{{asset(''.$item->book->image)}}" alt="..." style="max-width: 90px;max-height: 90px;" class="img-responsive"/>
                                </div>
                                <div class="col-sm-8">
                                    <h4 class="nomargin">{{$item->book->name}}</h4>
                                    <p>{{$item->book->author->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">200</td>
                        <td data-th="Quantity">
                            <input value="1" class="form-control text-center">
                        </td>
                        <td data-th="Subtotal" class="text-center">{{$item->book->price*$item->quantity}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="visible-xs">

                </tr>
                <tr>

                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total {{$data['total']}}</strong></td>
                </tr>
                </tfoot>
            </table>


        </div>
    </div><!-- end of col-md-12 -->





@endsection

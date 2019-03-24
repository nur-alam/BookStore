@extends('layouts.admin-app')

@section('content')

<section id="BookDetails" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800" style="font-weight:bold;margin-right:50px;">Borrow list</h1>
                            <a class="btn" href="{{route('borrow.history')}}" style="font-wight:bold;">
                                Borrow Hisotry
                            </a>
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
                                    <a href="{{route('borrow.destroy',$order->id)}}" class="btn btn-info">
                                        <i class="fas fa-window-close"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                    <h3>Borrow is empty!</h3>
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

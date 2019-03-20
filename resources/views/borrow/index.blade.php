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
                                <th style="width: 10%">Date</th>
                                <th style="width: 10%">Status</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data['borrows'] as $borrow)
                           <?php
                             $date1 = date_create($borrow->created_at);
                             $date2 = date_create('now');
                             $diff = date_diff($date1,$date2);
                           ?>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-4 hidden-xs">
                                        <img src="{{ asset(''.$borrow->book->image) }}" alt="..." style="max-width: 90px;ax-height: 90px;" class="img-responsive"/>
                                    </div>
                                    <div class="col-sm-8">
                                        <h4 class="nomargin">{{$borrow->book->name}}</h4>
                                        <p>{{$borrow->book->author->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ $borrow->created_at->diffForHumans() }}</td>
                            <td data-th="Price" class=" {{ $borrow->status ? 'alert-info' : ( ($diff->format("%a") > 15) ? 'alert-danger': 'alert-info' )  }} " >
                                {{ $borrow->status ? 'okk' : ( $diff->format("%a") > 15 ? "Time over , pls return back book asap." : (15-$diff->format("%a"))." days to go" ) }}
                            </td>
                            <td data-th="Price">{{ $borrow->status ? 'returned' : 'should return' }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td>
                                    <h3>Your borrow item is empty!</h3>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div><!-- end of col-md-12 -->



        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of section  -->


@endsection

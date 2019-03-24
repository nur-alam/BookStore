@extends('layouts.app')

@section('content')

<section id="BookDetails" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="" style="margin-bottom: 60px;">
                         <h5>Book Details</h5>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="book-img float-right">
                            <img src="{{asset(''.$data['book']->image)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="book-desc" style="margin-bottom: 20px;">
                            <h4>{{$data['book']->name}}</h4>
                            <p>by {{$data['book']->author->name}}</p>
                            <h4>TK. {{$data['book']->price}} </h4>
                        </div>
                        <div class="book-btn">
                            <button class="btn btn-warning" onclick="document.getElementById('borrowbook').submit();">Rent Book</button>
                            <button class="btn btn-warning" onclick="document.getElementById('addtocart').submit();">Buy Book</button>
                            <form action="{{route('cart.store')}}" method="post" id="addtocart">
                                @csrf
                                <input type="hidden" value="{{$data['book']->id}}" name="book_id">
                                <input type="hidden" value="{{$data['book']->name}}" name="name">
                                <input type="hidden" value="{{$data['book']->price}}" name="price">
                            </form>
                            <form action="{{route('borrow.store')}}" method="post" id="borrowbook">
                                @csrf
                                <input type="hidden" value="{{$data['book']->id}}" name="book_id">
                                <input type="hidden" value="{{$data['book']->name}}" name="name">
                                <input type="hidden" value="{{$data['book']->price}}" name="price">
                            </form>
                        </div>
                        <div class="book-desc" style="margin-top: 20px;">
                            <p>
                                {{$data['book']->desc}}
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->



        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of section  -->


@endsection

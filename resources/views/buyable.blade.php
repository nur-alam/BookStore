@extends('layouts.app')

@section('content')


    <section id="cat-programming" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>Buyable Books</h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                    @foreach($data['buyable_books'] as $book)
                    <div class="col-md-3">
                        <div class="book_one">
                            <a href="{{route('bookdetials',$book->name)}}">
                                <!-- <img src="{{asset(''.$book->image)}}" alt=""> -->
                                <img src="{{asset(''.$book->image)}}" alt="{{$book->name}}">
                                <div class="book_hover_one">
                                    <div class="book-hover_txt">
                                        <div class="book_hover_txt_table_cell">
                                            <h5>{{$book->name}}</h5>
                                            <p>Written by <span class="writer">{{$book->author->name}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div><!-- end of col-md-12 -->
        </div><!-- end of row -->
    </div><!-- end of container -->
</section><!-- end of section  -->


@endsection

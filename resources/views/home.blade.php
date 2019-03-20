@extends('layouts.app')

@section('content')

    <!--Make sure the form has the autocomplete function switched off:-->
    {{--<form autocomplete="off" action="/action_page.php" class="section_padding">--}}
        {{--<div class="autocomplete" style="width:600px;">--}}
            {{--<input id="myInput" type="text" name="myCountry" placeholder="Country">--}}
        {{--</div>--}}
    {{--</form>--}}
    <section id="cat-programming" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>প্রোগ্রামিং এর বইসমূহ</h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                    @foreach($data['প্রোগ্রামিং'] as $book)
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



<section id="cat-design" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>উপন্যাস</h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                    @foreach($data['উপন্যাস'] as $book)
                    <div class="col-md-3">
                        <div class="book_one">
                            <a href="{{route('bookdetials',$book->name)}}">
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

<section id="cat-design" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>ধর্মীয় বই</h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                    @foreach($data['ধর্মীয়_বই'] as $book)
                        <div class="col-md-3">

                            <div class="book_one">
                                <a href="{{route('bookdetials',$book->name)}}">
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

<section id="cat-design" class="section_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="section_title cat_programming_title">
                        <a href="">
                            <h5>সায়েন্স ফিকশন</h5>
                        </a>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->
            <div class="col-md-12">
                <div class="row">

                    @foreach($data['সায়েন্স'] as $book)
                        <div class="col-md-3">
                            <div class="book_one">
                                <a href="{{route('bookdetials',$book->name)}}">
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

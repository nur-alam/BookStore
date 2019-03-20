@extends('layouts.app')

@section('title','category wise books')

@section('content')

<div class="container margin-from-header">

    <div class="col-md-12">

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 30px;">

            <h3>All books from {{$data['category']->name}}</h3>

        </nav> <!-- end of navbar navbar-expand-lg -->

    </div> <!-- end of col-md-12 -->


    <div class="col-md-12">

        <div class="row">

            @forelse($data['cat_books'] as $book)

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

            @empty
                <p>No book available</p>
            @endforelse

        </div> <!-- end of row -->


        {{ $data['cat_books']->links() }}


    </div> <!-- end of col-md-12 -->

</div>

@endsection

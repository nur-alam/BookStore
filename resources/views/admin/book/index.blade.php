@extends('layouts.admin-app')

@section('content')


<div class="col-md-12">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 30px;">

        <a class="navbar-brand btn btn-primary" data-toggle="modal" data-target="#bookEntryModal" href="javascript:void(0)" style="color: #fff;">
            Book Entry
        </a>

        <a class="navbar-brand btn btn-primary" data-toggle="modal" data-target="#createCategoryModal" href="javascript:void(0)" style="color: #fff;">
            Category Entry
        </a>

        <a class="navbar-brand btn btn-primary" data-toggle="modal" data-target="#createAuthorModal" href="javascript:void(0)" style="color: #fff;">
            Author Entry
        </a>

        <!-- bookEntryModal -->
        <div class="modal fade" id="bookEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Book Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="price">Book Price</label>
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}"  required autofocus>

                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <select name="author_id" data-size="6" class="selectpicker form-control{{ $errors->has('author_id') ? ' is-invalid' : '' }}" data-live-search="true" required>
                                    <option value="">Select Book Author</option>
                                    @foreach($data['authors'] as $author)
                                    <option data-tokens="{{$author->id}}" value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('author_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('author_id') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <select name="category_id" data-size="6" class="selectpicker form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" data-live-search="true" required>
                                    <option value="">Select Book Category</option>
                                    @foreach($data['categories'] as $cat)
                                    <option data-tokens="{{$cat->id}}" value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="desc">Book desc</label>
                                <textarea name="desc" rows="5" class="form-control" required></textarea>
                                @if ($errors->has('desc'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="image">Image of book</label>
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" >

                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- end of bookEntryModal Modal -->

        <!-- createCategoryModal -->
        <div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required  autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- end of bookEntryModal Modal -->

        <!-- createAuthorModal -->
        <div class="modal fade" id="createAuthorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Author Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('author.store')}}" method="post">

                            @csrf

                            <div class="form-group">
                                <label for="name">Author Name</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required  autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- end of bookEntryModal Modal -->

    </nav> <!-- end of navbar navbar-expand-lg -->

</div> <!-- end of col-md-12 -->


<div class="col-md-12">

    <div class="row">

        @forelse($data['books'] as $book)

        <div class="col- col-sm-6 col-md-6 col-lg-4 col-xl-3">

            <div class="books">

                <div class="book card" style="margin-bottom: 20px;">

                    <img class="card-img-top" src="{{ asset('/'.$book->image) }}" style="width: 100%;" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title book_name">{{$book->name}}</h5>
                        <p class="card-text book_writer">
                            written by <span>{{$book->author->name}}</span>
                        </p>
                    </div> <!-- end of card-body -->

                    <div class="card-body">
                        <a href="{{route('book.show',$book->name)}}" class="card-link">
                            show
                        </a>
                        <a href="{{route('book.edit',$book->name)}}" class="card-link">
                            edit
                        </a>
                        <a href="" class="card-link"
                           onclick="
                                    event.preventDefault();
                                    if (confirm('Are u sure')){
                                        document.getElementById('book-delete-form').submit();
                                    }
                                "
                        >
                            delete
                            <form id="book-delete-form" action="{{route('book.destroy',$book->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </a>
                    </div> <!-- end of card-body -->

                </div> <!-- end of card -->

            </div> <!-- end of books -->

        </div> <!-- end of col-md-3 -->

        @empty
        <p>No book available</p>
        @endforelse

    </div> <!-- end of row -->


    {{ $data['books']->links() }}


</div> <!-- end of col-md-12 -->


@endsection

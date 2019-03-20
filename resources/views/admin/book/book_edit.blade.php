
@extends('layouts.admin-app')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


    <!-- Content Row -->
    <div class="col-md-12">

        <div class="row">

            <form action="{{route('book.update',$data['book']->name)}}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Book Name</label>
                    <input value="{{$data['book']->name}}" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">Book Price</label>
                    <input id="price" value="{{$data['book']->price}}" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}"  required autofocus>

                    @if ($errors->has('price'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <select name="author_id" data-size="6" class=" form-control{{ $errors->has('author_id') ? ' is-invalid' : '' }}" data-live-search="true">
                        <option>select owner person</option>
                        @foreach($data['authors'] as $author)
                            <option value="{{$author->id}}" {{ $data['book']->author_id == $author->id ? ' selected' : '' }} data-tokens="{{$author->id}}" >{{$author->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('author_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('author_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <select name="category_id" data-size="6" class="selectpicker form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" data-live-search="true">
                        <option>select book category</option>
                        @foreach($data['categories'] as $cat)
                            <option {{ $data['book']->category_id == $cat->id ? ' selected ' : '' }} value="{{$cat->id}}" data-tokens="{{$cat->id}}" >{{$cat->name}}</option>
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
                    <textarea name="desc" rows="5" class="form-control" required>
                        {{$data['book']->desc}}
                    </textarea>
                    @if ($errors->has('desc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" type="file"  class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" onchange="readImage(this);"  autofocus>

                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <img src="{{ asset('/'.$data['book']->image) }}" id="previewimg" style="max-width: 200px; max-height: 200px;" alt="book image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>	<!-- End of row -->


        </form><!-- End of form -->

    </div><!-- End of col-md-12 -->



@endsection

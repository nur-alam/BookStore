@extends('layouts.admin-app')

@section('content')


<div class="col-md-12">

    <a class="navbar-brand btn btn-primary" data-toggle="modal" data-target="#bookEntryModal" href="javascript:void(0)" style="color: #fff;">
        Assign Book
    </a>
    <!-- bookEntryModal -->
    <div class="modal fade" id="bookEntryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('borrow.store')}}" method="post" id="addtoborrow">
                        @csrf
                        <div class="form-group">
                            <select name="user_id" data-size="6" class="selectpicker form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" data-live-search="true" required>
                                <option value="">Select User</option>
                                @foreach($data['users'] as $user)
                                    <option data-tokens="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <select name="book_id" data-size="6" class="selectpicker form-control{{ $errors->has('book_id') ? ' is-invalid' : '' }}" data-live-search="true" required>
                                <option value="">Select Book</option>
                                @foreach($data['books'] as $book)
                                    <option data-tokens="{{$book->id}}" value="{{$book->id}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('book_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('book_id') }}</strong>
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

</div> <!-- end of col-md-12 -->


<section id="BookDetails" class="section_padding margin-from-header">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="" style="margin-bottom: 30px;margin-top: 30px;">
                        <h5>Borrow list</h5>
                    </div>
                </div>
            </div><!-- end of col-md-12 -->

            <div class="col-md-12">
                <div class="row">
                    <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">User</th>
                            <th style="width:40%">Book</th>
                            <th style="width: 15%">Date</th>
                            <th style="width: 15%">Status</th>
                            <th style="width:10%">Actions</th>
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
                                <td>{{$borrow->user->name}}</td>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-4 hidden-xs"><img src="{{ asset(''.$borrow->book->image) }}" alt="..." style="max-width: 90px;ax-height: 90px;" class="img-responsive"/></div>
                                        <div class="col-sm-8">
                                            <h4 class="nomargin">{{$borrow->book->name}}</h4>
                                            <p>{{$borrow->book->author->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">{{ $borrow->created_at->diffForHumans() }}</td>
                                <td data-th="Price" class=" {{ $diff->format("%a") > 15 ? 'alert-danger' : ''}} " >
                                    {{ $diff->format("%a") > 15 ? "Time over , take some actions to this user!!." : $diff->format("%a")." days ago" }}
                                </td>
                                <td data-th="Price">
                                    <a href="{{route('borrow.update',[$borrow->user_id,$borrow->book_id] )}}" class="btn btn-danger" onclick="document.getElementById('borrowback').submit()">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
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

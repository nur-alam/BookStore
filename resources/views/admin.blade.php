@extends('layouts.admin-app')

@section('content')


<!-- Content Row -->

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Usars</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['users'])}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-users fa-2x" style="color: #4e73df;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Books</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['books'])}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-book-open fa-2x" style="color: #1cc88a;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Authors</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($data['authors'])}}</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-pencil-alt fa-2x" style="color: #36b9cc;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Category</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data['categories'])}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-th-list fa-2x" style="color: #f6c23e ;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Content Row -->


@endsection

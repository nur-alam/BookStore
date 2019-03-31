<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

    <title>{{ config('app.name', 'BookHub') }}</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- Custom styles for this template-->
    <link href=" {{ asset('/css/admin/all.css') }} " rel="stylesheet">
    <link href=" {{ asset('/css/admin/sb-admin-2.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('/css/admin/bootstrap-select.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('/css/toaster.css') }} " rel="stylesheet">
    <link href=" {{ asset('/css/admin/app.css') }} " rel="stylesheet">
    <link href=" {{ asset('/css/admin/style.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include ('layouts.admin-sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


          <!-- Main Content -->
          <div id="content">


            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fas fa-users"></i>
              </button>


              <!-- Topbar Search -->
              {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form> --}}


              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">


                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">

                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">

                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                      {{ auth('admin')->user()->name }}
                    </span>
                    <img class="img-profile rounded-circle"
                    src="{{ asset('img/default.png') }}">
                  </a>

                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{route('home')}}">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      BookHub
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('login') }}" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>

                </li>

              </ul>

            </nav>
            <!-- End of Topbar -->



            <!-- Begin Page Content -->
            <div class="container">


                <!-- Content Row -->

                <div class="row">

                    @yield('content')

                </div>





            </div>
            <!-- /.container-fluid -->


          </div>
          <!-- End of Main Content -->



          <!-- Footer -->
          <footer class="sticky-footer bg-white">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2019</span>
              </div>
            </div>
          </footer>
          <!-- End of Footer -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="dropdown-item" href="{{ route('admin.logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/js/admin/jquery.min.js') }}"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="{{ asset('/js/admin/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/admin/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/toaster.js') }}"></script>
    <!-- <script src="../js/admin/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/js/admin/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/admin/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('/js/admin/app.js') }}"></script>

    <script>
        // preview image
        function readImage(input){
            //console.log(e.files);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewimg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }

        }

        toastr.options.closeButton = true;
        @if(session()->has('success'))
            toastr.success("{{session('success')}}");
        @endif
        @if($errors->any())
            @if($errors->count() == 1)
                toastr.error("{{ $errors->first() }}");
            @else
               toastr.error("@forEach($errors->all() as $error) {{$error}}  @endforeach", {timeOut: 60000} );
            @endif
        @endif

        $(document).ready( function () {

            $('#table_id').DataTable();

            //$("#return_date").datepicker({ dateFormat: "yy-mm-dd" }).val();

            $( "#issue_date" ).datepicker({
                dateFormat : "yy-mm-dd",
                minDate: 'dateToday'
            });
            $('#issue_date').datepicker('setDate', 'today');
            $( "#return_date" ).datepicker({
                dateFormat : "yy-mm-dd",
                altField: '#thealtdate',
                altFormat: 'yy-mm-dd'
            });

            $('.selectpicker').selectpicker();

            setTimeout(function(){
                $('.success-float').hide();
            },1000);

        });

    </script>



</body>

</html>

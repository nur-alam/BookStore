<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-book-open fa-2x" style="color: #1cc88a;"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Dashboard </div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.users')}}">
        <i class="fas fa-user-friends"></i>
        <span>users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('book.index')}}">
        <i class="fas fa-book"></i>
        <span>Book Management</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('order.index')}}">
        <i class="fas fa-sort-amount-down"></i>
        <span>Order Management</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.borrow.index')}}">
        <i class="fas fa-sort-alpha-up"></i>
        <span>Rent Book Management</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html">Animations</a>
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li> --}}



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->

<header id="header">
    <div class="container main-menu">

        <div class="row align-items-center justify-content-between d-flex">

          <div id="logo">

            <a href="/">
              <h5 style="color: #333;">BookHub</h5>
            </a>

            <!-- <a href="/"><img src="img/logo.png" alt="" title="" /></a> -->
          </div>

          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li>
                <form class="form-inline my-2 my-lg-0">
                    <input  id="myInput"  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    {{--<input id="myInput" type="text" name="myCountry" placeholder="Country">--}}
                    {{--<input  id="search"  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                    {{--onkeyup="searchFunction()" onfocusout="disableSearchResult()" --}}
                    
                </form>
              </li>
              <li class="menu-has-children">
                <a href="javascript:void(0)">Book Category</a>
                <ul>
                  <li>
                  <a href="{{route('buyable')}}">
                      Buyable Books
                    </a>
                  </li>
                  <li>
                  <a href="{{route('reantable')}}">
                      Rentable Books
                    </a>
                  </li>
                  <li><a href="{{route('cat_wise_books','প্রোগ্রামিং')}}">প্রোগ্রামিং</a></li>
                  <li><a href="{{route('cat_wise_books','উপন্যাস')}}">উপন্যাস</a></li>
                  <li><a href="{{route('cat_wise_books','সায়েন্স')}}">সায়েন্স</a></li>
                  <li><a href="{{route('cat_wise_books','ধর্মীয় বই')}}">ধর্মীয় বই</a></li>
                </ul>
              </li>
              @auth
              <li>
                  <a href="{{ route('cart.index') }}">
                    <span id="cart_menu" class="badge badge-pill badge-primary" style="padding: 7px 6px;font-size: 12px;">Cart <span style="margin-left: 5px;">{{$cart}}</span></span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('borrow.index') }}">
                    <span id="cart_menu" class="badge badge-pill badge-primary" style="padding: 7px 6px;font-size: 12px;">Rent <span style="margin-left: 5px;">{{$borrow}}</span></span>
                  </a>
              </li>
              <li class="menu-has-children">
                <a href="javascript:void(0)">
                  {{Auth::user()->name}}
                </a>
                <ul>
                  <li>
                    <a href="{{route('order_list')}}">
                      Your Order List
                    </a>
                  </li>
                  <li>
                    <a href="{{route('borrowlist')}}">
                      Your Rent List
                    </a>
                  </li>
                  <li>
                    <a href="{{route('profile.index')}}">
                      Profile
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
              @else
                <li>
                    <a href="{{ route('login') }}">
                      Login
                    </a>
                </li>
                <li>
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}">Register</a>
                  @endif
                </li>
              @endauth

            </ul>
          </nav><!-- #nav-menu-container -->
        </div>

    </div>
</header><!-- #header -->

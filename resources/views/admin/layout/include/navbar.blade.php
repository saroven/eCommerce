<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      @csrf
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i style="font-size: 25px;" class="fas fa-envelope"></i>
          {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: 260px;">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/avater/avater.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i style="font-size: 27px;" class="fas fa-bell"></i>
          {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: 260px;">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img style="height:23px;" src="{{asset(auth()->user()->image)}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
        </a>
        <ul style="width: 300px; padding: 10px;" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li  style=" text-align: center; padding: 10px 0px;" class="user-header bg-primary">
          <img style="height:80px;     border: 3px solid #0884ea;" src="{{asset(auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">

            <p>
              {{auth()->user()->name}}
              @php
                  $d = date('F Y',strtotime(auth()->user()->created_at));
              @endphp
              <small style="display: block;">Member Since {{$d}} </small>
            </p>
          </li>
          <!-- Menu Body -->
          <li style="    overflow: hidden;" class="user-body">
            <div class="row" style="padding: 20px 0; border-bottom: 1px solid #3490dc;">
              <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer" style="padding: 10px 0; background: #eaeaea; margin-top: 10px; border-radius: 10px;">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-default btn-flat float-right">Logout</a>

          </li>
        </ul>
      </li>

    </ul>
  </nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <a href="{{url('/dashboard')}}" class="brand-link">

    {{-- <img src="{{asset('img')}}/{{settings()->logo}}" alt="{{config('app.name')}}" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
    <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset(auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('dashboard')}}" id="dashboard" class="nav nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
            </li>
          <li class="nav-item has-treeview" id="product-main">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pencil-alt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link" id="product-all">
                  <i class="fas fa-square nav-icon"></i>
                  <p>All Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link" id="product-add">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link" id="categories">
                  <i style="font-size:16px;" class="fas fa-th-large nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('brand.index') }}" class="nav-link" id="brands">
                  <i style="font-size:16px;" class="fas fa-th-large nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview" id="user-main">
            <a href="#" class="nav-link" id="user">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav nav-link" id="user-all">
                  <i class="fas fa-square nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link nav" id="user-add">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('contact.index') }}" class="nav-link" id="contact">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Contacts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link" id="setting">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

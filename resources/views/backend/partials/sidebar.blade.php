<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ url("assets/backend/dist/img/AdminLTELogo.png") }}" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Soft IT Care</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('images/'.Auth::guard('admin')->user()->image ) }}" class="img-circle elevation-2" alt="Admin Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
          <!-- <span class="" style="color:rgba(255,255,255,.6); font-size:12px;">Dhaka, Bangladesh</span> -->
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active"> --}}
        <li class="nav-item has-treeview ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Admin Profile
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('settings') }}" class="nav-link">
                <i class="far fa-edit nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
            <li class="nav-item">
              {{-- <a href="#" class="nav-link active"> --}}
              <a href="{{ route('updateDetails') }}" class="nav-link">
                <i class="fas fa-user-edit nav-icon"></i>
                <p>Change Profile</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Add New User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="fas fa-list-alt nav-icon"></i>
                <p>All User</p>
              </a>
            </li> --}}
          </ul>
        </li>
        <li class="nav-item">
<!--             <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="far fa-copyright nav-icon"></i>
            <p>
              Logo
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('logo.create') }}" class="nav-link">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Add Logo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('logo.all') }}" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>Manage Logo</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-list nav-icon"></i>
            <p>
              Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('menu.create') }}" class="nav-link">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Add Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('menu.all') }}" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>Manage Menu</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Slider
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Add Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Slider</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              About Us
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/UI/general.html" class="nav-link">
                <i class="fas fa-plus-square nav-icon"></i>
                <p>Add </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p> Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

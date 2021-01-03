<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">{{env('APP_NAME')}} Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin-dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="{{route('show-item')}}">
          <i class="fas fa-fw fa-hotel"></i>
          <span>Item</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="{{route('all-order')}}">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Transaksi</span></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Green Market</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active d-flex flex-row my-3 justify-content-center">
        <img class="img-fluid img rounded-circle" style="height: 80px;"
            src="{{ asset('dashboard/img/undraw_profile.svg') }}"
            alt="">
    </li>
    <p class="text-center text-white">Hello, {{ $user->name }}</p>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.customers') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.categories') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Categories</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.products') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Products</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Orders</span>
        </a>
    </li>

</ul>

<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logo-green-market.png') }}" width="32px" style="" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Green Market</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active d-flex flex-row my-3 justify-content-center">
        @if ($user->photo)
            <img class="img-fluid img rounded-circle" src="{{ asset('storage/photos/'. $user->photo) }}" style="height: 80px;">
        @else
            <img class="img-fluid img rounded-circle" src="{{ asset('dashboard/img/undraw_profile.svg') }}"
                style="height: 80px;">
        @endif
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
        <a class="nav-link" href="{{ route('admin.orders') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Orders</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.profile.edit', $user) }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

</ul>

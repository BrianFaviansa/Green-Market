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
        <a class="nav-link" href="{{ route('landing') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.carts') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Cart</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.orders') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Orders</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.profile.edit', $user) }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>
</ul>

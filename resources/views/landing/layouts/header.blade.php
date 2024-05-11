<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('landing') }}" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>greenmarket<span>.</span></h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/#hero">Home</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="/#menu">Product</a></li>
                <li><a href="/#footer">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->

        @guest
            <a class="btn-book-a-table" href="{{ route('login') }}">Sign Up | Login</a>
        @endguest
        @auth
            <a class="btn-book-a-table" href="{{ route('logout') }}">Logout</a>
        @endauth
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>

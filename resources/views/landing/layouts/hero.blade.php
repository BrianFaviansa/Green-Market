<section id="home" class="hero d-flex align-items-center section-bg">
    <div class="container">
        <div class="row justify-content-between gy-5">
            <div
                class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                <h2 data-aos="fade-up">Welcome To<br>Green Market</h2>
                <p data-aos="fade-up" data-aos-delay="100">Fresh, Healthy, Trusted: Find the Best Choice at Green Market!
                </p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    @guest
                        <a class="btn-book-a-table" href="{{ route('login') }}">Sign Up | Login</a>
                    @endguest
                    @auth
                        @if (Auth::user()->is_admin == 1)
                            <a class="btn-book-a-table" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @else
                            <a class="btn-book-a-table" href="{{ route('user.carts') }}">Dashboard</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                <img src="{{ asset('landing/assets/img/hero-img.png') }}" class="img-fluid" alt=""
                    data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>
    </div>
</section>

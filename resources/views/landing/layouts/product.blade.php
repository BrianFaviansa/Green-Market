<section id="products" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Our Products</h2>
            <p>Check Our <span>Best Products</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach ($categories as $key => $category)
                <li class="nav-item">
                    <a class="nav-link @if ($key === 0) active show @endif" data-bs-toggle="tab"
                        data-bs-target="#menu-{{ $category->category_name }}">
                        <h4>{{ $category->category_name }}</h4>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
            @foreach ($categories as $key => $category)
                <div class="tab-pane fade @if ($key === 0) show active @endif"
                    id="menu-{{ $category->category_name }}">
                    <div class="tab-header text-center">
                        <p>Products</p>
                        <h3>{{ $category->category_name }}</h3>
                    </div>
                    <div class="row gy-5">
                        @foreach ($category->products as $product)
                            <div class="col-lg-4 menu-item">
                                <a href="" class="glightbox"><img
                                        src="{{ asset('storage/product_images/' . $product->product_image) }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4 class="text-xl">{{ $product->product_name }}</h4>
                                <p class="text-lg font-weight-normal"> {{ $product->product_desc }} </p>
                                <p class="price"> Rp {{ $product->price }} </p>
                                @auth
                                    @if (Auth::user()->is_admin == 0)
                                        <button class="add-to-cart btn btn-success"
                                            data-product-id="{{ $product->id }}">Add to Cart</button>
                                    @endif
                                @endauth
                            </div><!-- Menu Item -->
                        @endforeach
                    </div>
                </div><!-- End Tab Content -->
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function(e) {
                e.preventDefault();

                let productId = $(this).data('product-id');
                let quantity = 1;

                $.ajax({
                    url: '{{ route('cart.add') }}',
                    type: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.message);
                        const alertElement = $(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">' +
                            response.message +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>');

                        // Menambahkan alert ke body
                        $('body').append(alertElement);

                        // Otomatis menutup alert setelah 3 detik
                        setTimeout(function() {
                            alertElement.alert('close');
                        }, 3000);
                    },
                    error: function(xhr) {

                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</section>

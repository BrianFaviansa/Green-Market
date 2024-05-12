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
                e.preventDefault(); // Mencegah submit form secara default

                var productId = $(this).data('product-id');
                var quantity = 1; // Atur kuantitas default sebagai 1

                // Kirim permintaan AJAX
                $.ajax({
                    url: '{{ route('cart.add') }}', // Ganti dengan rute yang sesuai
                    type: 'POST',
                    data: {
                        product_id: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}' // Tambahkan token CSRF
                    },
                    success: function(response) {
                        // Tindakan setelah permintaan AJAX berhasil
                        console.log(response.message);
                        // Lakukan tindakan lain jika diperlukan, seperti memperbarui tampilan cart
                    },
                    error: function(xhr) {
                        // Tindakan jika terjadi kesalahan
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</section>

@extends('dashboard.layouts.app-user')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cart</h1>
    </div>

    <section class="h-100">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    @if ($order && $order->orderDetails->isNotEmpty())
                        @foreach ($order->orderDetails as $od)
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="{{ asset('storage/product_images/' . $od->product->product_image) }}"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-bold mb-2">{{ $od->product->product_name }}</p>
                                            <p><span class="text-muted">{{ $od->product->product_desc }}</p>
                                            <p class="">Rp {{ $od->price }}</p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-inline-flex">
                                            <label for="quantity" class="form-label">Quantity :</label>
                                            <p class="ml-2">{{ $od->quantity }}</p>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">Rp {{ $od->price * $od->quantity }}</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-center">
                                            <a href="#!" class="text-danger delete-product"
                                                data-product-id="{{ $od->product->id }}"><i
                                                    class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="card">
                            <div class="card-body">
                                <p class="text-center fw-bold fs-3">Total Price : {{ $order->total_price }}</p>
                                <button type="button" class="btn btn-primary btn-block btn-lg"
                                    id="checkout-btn">Checkout</button>
                            </div>
                        </div>
                    @else
                        <h2>Your cart is empty, please add some products.</h2>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <script>
        $('.delete-product').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to remove this product from your cart.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('cart.remove') }}',
                        type: 'POST',
                        data: {
                            product_id: productId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response.message);
                            const alertElement = $(
                                '<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">' +
                                response.message +
                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                '</div>');

                            $('body').append(alertElement);

                            setTimeout(function() {
                                alertElement.alert('close');
                                location.reload();
                            }, 1500);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });

        $('#checkout-btn').click(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to checkout your cart.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, checkout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('checkout') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                position: 'middle',
                                icon: 'success',
                                title: 'Checkout Success!',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection

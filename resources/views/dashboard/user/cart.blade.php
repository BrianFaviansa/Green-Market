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

                    @if ($order)
                        @foreach ($order->orderDetails as $od)
                            <div class="card rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="{{ asset('storage/product_images/' . $od->product->product_image) }}"
                                                class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2">{{ $od->product->product_name }}</p>
                                            <p><span class="text-muted"> </p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="quantity" min="0" name="quantity" value="{{ $od->quantity }}"
                                                type="number" class="form-control form-control-sm"
                                                data-price="{{ $od->price }}"
                                                data-order-detail-id="{{ $od->id }}" />

                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">Rp {{ $od->price }}</h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="card">
                            <div class="card-body">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-block btn-lg">Proceed to Pay</button>
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
        $(document).ready(function() {
            $('input[name="quantity"]').on('input', function() {
                var quantity = $(this).val();
                var price = $(this).data('price');
                var orderDetailId = $(this).data('order-detail-id');

                $.ajax({
                    url: '{{ route('order-detail.update') }}', // Ganti dengan rute yang sesuai
                    type: 'POST',
                    data: {
                        order_detail_id: orderDetailId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Perbarui harga
                        console.log(response.message);
                        var cardBody = $(this).closest('.card-body');
                        cardBody.find('.mb-0').text('Rp ' + response.total_price.toFixed(2));
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection

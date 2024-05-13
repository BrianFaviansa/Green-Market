{{-- @extends('dashboard.layouts.app-user')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Orders</h1>
    </div>

    <!-- Content Row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Order Date</th>
                </tr>
            </thead>
            <tbody class="table-group-divider table-hover">
                @forelse ($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->user->phone_number }}</td>
                        <td>{{ $order->user->home_address }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->created_at->format('d F Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">no order found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('dashboard.layouts.app-user')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Orders</h1>
    </div>

    <!-- Content Row -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Details</th>
                </tr>
            </thead>
            <tbody class="table-group-divider table-hover">
                @forelse ($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->user->phone_number }}</td>
                        <td>{{ $order->user->home_address }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->created_at->format('d F Y') }}</td>
                        <td>
                            <ul>
                                @foreach ($order->orderDetails as $detail)
                                    <li>
                                        {{ $detail->product->product_name }} -
                                        Quantity : {{ $detail->quantity }},
                                        Price : {{ $detail->price }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

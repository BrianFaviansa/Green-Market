@extends('dashboard.layouts.app-admin-crud')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>

    @include('dashboard.admin.products.modal-create')

    @if (session()->has('success'))
        <div class="my-2">
            @include('dashboard.layouts.alert-success')
        </div>
    @endif
    @if (session()->has('error'))
        <div class="my-2">
            @include('dashboard.layouts.alert-error')
        </div>
    @endif



    <!-- Content Row -->
    <div class="table-responsive mb-2">
        <table class="table table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="text-center">
                        <th class="align-middle text-center" scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <img src="{{ asset('storage/product_images/' . $product->product_image) }}"
                                alt="{{ $product->product_name }}" class="img img-fluid" style="max-width: 100px;">
                        </td>
                        <td class="align-middle">{{ $product->product_name }}</td>
                        <td class="align-middle">{{ $product->product_desc }}</td>
                        <td class="align-middle">{{ $product->category->category_name }}</td>
                        <td class="align-middle">Rp {{ $product->price }}</td>
                        <td class="align-middle">
                            @include('dashboard.admin.products.modal-edit')
                            @include('dashboard.admin.products.modal-delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

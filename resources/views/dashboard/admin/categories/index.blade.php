@extends('dashboard.layouts.app-admin-crud')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    </div>

    @include('dashboard.admin.categories.modal-create')

    @if (session()->has('success'))
        <div class="my-2">
            @include('dashboard.layouts.alert-success')
        </div>
    @endif

    <!-- Content Row -->
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->category_name }}</td>
                    <td>
                        @include('dashboard.admin.categories.modal-edit')
                        @include('dashboard.admin.categories.modal-delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

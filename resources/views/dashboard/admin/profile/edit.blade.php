@extends('dashboard.layouts.app-admin-crud')

@section('content')
    <div class="mx-5">
        <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email"
                        required>
                </div>
                <div class="mb-3">
                    
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control"
                        id="phone_number" required>
                </div>
                <div class="mb-3">
                    <label for="home_address" class="form-label">Home Address</label>
                    <input type="text" name="home_address" class="form-control" value="{{ $user->home_address }}"
                        id="home_address" required>
                </div>
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input type="password" name="oldPassword" class="form-control" id="oldPassword">
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" name="newPassword" class="form-control" id="newPassword">
                    <span class="text-sm text-muted">Leave password field empty if you dont want to update your
                        password</span>
                </div>
            </div>
        </form>
    </div>
@endsection

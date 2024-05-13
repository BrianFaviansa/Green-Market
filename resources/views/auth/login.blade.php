@extends('auth.layout')
@if (session()->has('success'))
    <div class="alert-success alert-dismissible alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex align-items-center h-100 py-4 bg-body-tertiary">
    <main class="form-signin m-auto col-lg-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email"
                    placeholder="Enter your registered email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password"
                    placeholder="Enter your registered password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success rounded-pill w-100 py-2" type="submit">Login</button>
            <p class="mt-3 mb-3 text-body-secondary">Don't have an account? <a class="link-success"
                    href="{{ route('register') }}">Sign Up
                    Now</a></p>
        </form>
    </main>
    <script src="{{ asset('auth/login/js/bootstrap.bundle.min.js') }}"></script>

</div>

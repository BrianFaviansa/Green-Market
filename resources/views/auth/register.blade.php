@extends('auth.layout')

@section('content')
<div class="d-flex align-items-center h-100 py-5 bg-body-tertiary" style="margin-top: 200px;">
    <main class="form-signin py-5 m-auto col-lg-4">
        <form action="{{ route('store.user') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please Register</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button class="btn btn-success rounded-pill w-100 py-2" type="submit">Register</button>
            <p class="mt-3 mb-3 text-body-secondary">Already a member? <a href="{{ route('login') }}">Sign In</a></p>
        </form>
    </main>
</div>
<script src="{{ asset('auth/login/js/bootstrap.bundle.min.js') }}"></script>

@endsection

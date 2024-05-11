@extends('auth.layout')
<div class="d-flex align-items-center h-100 py-4 bg-body-tertiary">
    <main class="form-signin m-auto col-lg-4">
        <form>


            <h1 class="h3 mb-3 fw-normal">Please Register</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
            </div>

            <button class="btn btn-success w-100 py-2" type="submit">Register</button>
            <p class="mt-3 mb-3 text-body-secondary">Already a member? <a href="{{ route('login') }}">Sign In</a></p>

        </form>
    </main>
    <script src="{{ asset('auth/login/js/bootstrap.bundle.min.js') }}"></script>

</div>

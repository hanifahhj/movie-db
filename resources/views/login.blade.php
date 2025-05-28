@extends('layouts.template')
@section('content')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow border-success">
        <div class="card-header bg-success text-white text-center">
          <h4 class="mb-0">Login</h4>
        </div>
        <div class="card-body">
          <form action="/login" method="post">
            {{-- untuk menghindari ada input dari luar --}}
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email"
                     name="email"
                     id="email"
                     class="form-control @error('email') is-invalid @enderror"
                     aria-describedby="emailHelp"
                     placeholder="Enter your email">
              <div id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</div>
              @error('email')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password"
                     name="password"
                     class="form-control @error('password') is-invalid @enderror"
                     id="exampleInputPassword1"
                     placeholder="Enter your password">
              @error('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>

            <button type="submit" class="btn btn-success w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

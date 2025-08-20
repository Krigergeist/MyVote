@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 shadow-soft">
        <h3 class="mb-3 text-center">Login</h3>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="usr_email" class="form-control" required value="{{ old('usr_email') }}">
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="usr_password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Belum punya akun? <a href="{{ route('register.add') }}">Register</a></p>
      </div>
    </div>
  </div>
</div>
@endsection

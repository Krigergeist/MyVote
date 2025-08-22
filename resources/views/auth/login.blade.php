@extends('layouts.app')

@section('content')
<div class="container my-5" style="height: 60vh;">
  <div class="row justify-content-center">
    <div class="col-md-6">

      {{-- Tampilkan error login --}}
      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

      {{-- Tampilkan validasi error --}}
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

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
        <p class="mt-3 text-center">
          Belum punya akun? <a href="{{ route('register.add') }}">Register</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection

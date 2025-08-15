@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 shadow-soft">
        <h3 class="mb-3 text-center">Register</h3>
        <form id="registerForm">
          <div class="mb-3"><label>Name</label><input type="text" id="regName" class="form-control" required></div>
          <div class="mb-3"><label>Email</label><input type="email" id="regEmail" class="form-control" required></div>
          <div class="mb-3"><label>Password</label><input type="password" id="regPassword" class="form-control" required></div>
          <div class="mb-3"><label>Role</label><select id="regRole" class="form-control"><option value="user">User</option><option value="admin">Admin</option></select></div>
          <button class="btn btn-success w-100">Register</button>
        </form>
        <p class="mt-3 text-center">Sudah punya akun? <a href="login">Login</a></p>
      </div>
    </div>
  </div>
</div>
@endsection
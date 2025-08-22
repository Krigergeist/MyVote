@extends('layouts.app')

@section('content')
<div class="container my-4">
  <h2 class="text-center mb-4 fw-bold">Edit Account</h2>
  <form method="POST" action="{{ route('account.update', $account->id) }}">
    @csrf
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="usr_name" class="form-control" value="{{ $account->usr_name }}" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="usr_email" class="form-control" value="{{ $account->usr_email }}" required>
    </div>
    <div class="mb-3">
      <label>Password (kosongkan jika tidak diubah)</label>
      <input type="password" name="usr_password" class="form-control">
    </div>
    <div class="mb-3">
      <label>Role</label>
      <select name="usr_role" class="form-select" required>
        <option value="student" {{ $account->usr_role == 'student' ? 'selected' : '' }}>Student</option>
        <option value="student_affairs" {{ $account->usr_role == 'student_affairs' ? 'selected' : '' }}>Student Affairs</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
</div>
@endsection

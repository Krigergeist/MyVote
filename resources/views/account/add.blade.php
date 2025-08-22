@extends('layouts.app') 

@section('content')
<div class="container my-4">
  <h2 class="text-center mb-4 fw-bold">Add Account</h2>

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

  <form method="POST" action="{{ route('account.store') }}">
    @csrf
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="usr_name" class="form-control @error('usr_name') is-invalid @enderror" value="{{ old('usr_name') }}" required>
      @error('usr_name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="usr_email" class="form-control @error('usr_email') is-invalid @enderror" value="{{ old('usr_email') }}" required>
      @error('usr_email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="usr_password" class="form-control @error('usr_password') is-invalid @enderror" required>
      @error('usr_password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="usr_role" class="form-select @error('usr_role') is-invalid @enderror" required>
        <option value="student" {{ old('usr_role') == 'student' ? 'selected' : '' }}>Student</option>
        <option value="student_affairs" {{ old('usr_role') == 'student_affairs' ? 'selected' : '' }}>Student Affairs</option>
      </select>
      @error('usr_role')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-success">Save</button>
  </form>
</div>
@endsection

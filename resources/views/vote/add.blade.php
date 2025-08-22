@extends('layouts.app')

@section('content')
<div class="container" style="height: 60vh;">
  <h2>Add Candidate</h2>

  {{-- tampilkan pesan error validasi --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Maaf!</strong> Ada beberapa masalah dengan input Anda:<br><br>
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- tampilkan pesan sukses kalau ada --}}
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form method="POST" action="{{ route('vote.store', $id) }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="desc" class="form-control">{{ old('desc') }}</textarea>
    </div>
    <div class="mb-3">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
@endsection

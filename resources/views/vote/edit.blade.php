@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Edit Candidate</h2>
  <form method="POST" action="{{ route('vote.update', $candidate->cdt_id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="{{ $candidate->cdt_name }}" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ $candidate->cdt_email }}" required>
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ $candidate->cdt_phone }}" required>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="desc" class="form-control">{{ $candidate->cdt_desc }}</textarea>
    </div>
    <div class="mb-3">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control">
      @if($candidate->cdt_photo && file_exists(public_path('storage/'.$candidate->cdt_photo)))
        <img src="{{ asset('storage/'.$candidate->cdt_photo) }}" width="80" class="mt-2 rounded">
      @else
        <img src="{{ asset('img/default.png') }}" width="80" class="mt-2 rounded">
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection

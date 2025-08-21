@extends('layouts.app')

@section('content')
<div class="container my-4">
  <h2 class="text-center mb-4 fw-bold">Add Candidate</h2>
  <form id="addForm" class="card p-4">
    <div class="row g-3">
      <div class="col-12"><label class="form-label">Name</label><input class="form-control" name="name" required></div>
      <div class="col-12"><label class="form-label">Email</label><input class="form-control" name="email" type="email" required></div>
      <div class="col-12"><label class="form-label">Phone</label><input class="form-control" name="phone" required></div>
      <div class="col-12"><label class="form-label">Description</label><textarea class="form-control" name="desc" rows="3" placeholder="Short candidate description"></textarea></div>
      <div class="col-md-8"><label class="form-label">Photo</label><div id="dropzone" class="dropzone">Drop image here or click 'Choose File'</div></div>
      <div class="col-md-4 d-flex align-items-end"><input id="photo" type="file" accept="image/*" class="form-control"></div>
    </div>
    <div class="text-center mt-4"><button class="btn btn-primary btn-pill px-4">Add Candidate</button></div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
@endsection
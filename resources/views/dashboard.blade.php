@extends('layouts.app')

@section('content')
<div class="container my-4 container-narrow" style="height: 50vh;">
  <h2 class="text-center mb-4 fw-bold">Manage Candidates</h2>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div class="flex-grow-1 me-3">
      <div class="input-group">
        <span class="input-group-text">🔎</span>
        <input id="searchInput" type="text" class="form-control" placeholder="Search name, email, phone, desc...">
      </div>
    </div>
    <div class="btn-group">
      <a href="edit-candidate.html" class="btn btn-outline-secondary">Edit Candidate</a>
      <a href="add-candidate.html" class="btn btn-primary">Add Candidate</a>
      <a href="results.html" class="btn btn-outline-dark">Hasil Voting</a>
    </div>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light"><tr><th>Photo</th><th>Name</th><th>Email</th><th>Phone</th><th>Desc</th><th class="text-end">Action</th></tr></thead>
        <tbody id="candRows"></tbody>
      </table>
    </div>
  </div>
</div>
@endsection

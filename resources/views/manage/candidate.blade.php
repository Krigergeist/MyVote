@extends('layouts.admin')

@section('content')
<div class="container my-4 container-narrow" style="height: 60vh;">
  <h2 class="text-center mb-4 fw-bold">kelola kandidat</h2>

  {{-- Baris Add Candidate + Search --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    {{-- Search bar di kiri --}}
    <div class="flex-grow-1 me-3">
      <div class="input-group">
        <span class="input-group-text">🔎</span>
        <input id="searchCandidate" type="text" class="form-control" placeholder="Search name, email, phone...">
      </div>
    </div>

    {{-- Tombol Add Candidate --}}
<div>
  <a href="{{ route('candidate.create') }}" class="btn btn-primary">Add Candidate</a>
</div>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="candidateTable">
        <thead class="table-light">
          <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Desc</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($candidates as $candidate)
          <tr>
            <td>
              @if($candidate->cdt_photo && Storage::disk('public')->exists($candidate->cdt_photo))
                <img src="{{ asset('storage/'.$candidate->cdt_photo) }}" alt="photo" class="rounded" width="50">
              @else
                <img src="{{ asset('img/default.png') }}" alt="photo" class="rounded" width="50">
              @endif
            </td>
            <td>{{ $candidate->cdt_name }}</td>
            <td>{{ $candidate->cdt_email }}</td>
            <td>{{ $candidate->cdt_phone }}</td>
            <td>{{ $candidate->cdt_desc }}</td>
            <td class="text-end">
              <a href="{{ route('candidate.edit', $candidate->cdt_id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

              <form action="{{ route('candidate.destroy', $candidate->cdt_id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('Yakin ingin menghapus kandidat {{ $candidate->cdt_name }} ?')">Remove</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Script pencarian client-side --}}
<script>
  document.getElementById("searchCandidate").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#candidateTable tbody tr");
    rows.forEach(row => {
      let text = row.innerText.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });
</script>
@endsection

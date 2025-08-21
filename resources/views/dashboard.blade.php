@extends('layouts.app')

@section('content')
<div class="container my-4 container-narrow">
  <h2 class="text-center mb-4 fw-bold">Manage Candidates</h2>

  <div class="mb-3 text-end">
    <a href="{{ route('vote.add', ['id' => 1]) }}" class="btn btn-primary">Add Candidate</a>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
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
              @if($candidate->cdt_photo && file_exists(public_path('storage/'.$candidate->cdt_photo)))
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
              <a href="{{ route('vote.edit', $candidate->cdt_id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
              <a href="{{ route('vote.remove', $candidate->cdt_id) }}" class="btn btn-sm btn-outline-danger">Remove</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

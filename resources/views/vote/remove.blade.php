@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Remove Candidate</h2>
  <p>Yakin ingin menghapus kandidat <strong>{{ $candidate->cdt_name }}</strong>?</p>
  <form method="POST" action="{{ route('vote.destroy', $candidate->cdt_id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Yes, Delete</button>
    <a href="{{ route('candidates.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection

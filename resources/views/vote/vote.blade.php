@extends('layouts.app')

@section('content')
<h2>Pilih Kandidat</h2>
<form method="POST" action="/vote/{{ $id }}/vote">
    @csrf
    @foreach($candidates as $candidate)
        <div class="form-check">
            <input type="radio" name="candidate_id" value="{{ $candidate->id }}" class="form-check-input">
            <label>{{ $candidate->name }}</label>
        </div>
    @endforeach
    <button class="btn btn-success mt-3">Vote</button>
</form>
@endsection

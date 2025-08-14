@extends('layouts.app')

@section('content')
<h2>Profil Kandidat</h2>
<div class="card">
    <div class="card-body">
        <h4>{{ $candidate->name }}</h4>
        <p>{{ $candidate->vision }}</p>
        <p>{{ $candidate->mission }}</p>
    </div>
</div>
@endsection
    
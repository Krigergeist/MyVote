@extends('layouts.app')

@section('content')
<h2>Hasil Sementara</h2>
<table class="table table-bordered">
    <tr>
        <th>Kandidat</th>
        <th>Jumlah Suara</th>
    </tr>
    @foreach($results as $r)
    <tr>
        <td>{{ $r->candidate_name }}</td>
        <td>{{ $r->total_votes }}</td>
    </tr>
    @endforeach
</table>
@endsection

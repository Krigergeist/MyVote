@extends('layouts.app')

@section('content')
<h2>Tambah Jadwal Pemilihan</h2>
<form method="POST" action="/vote/schedule/add">
    @csrf
    <div class="mb-3">
        <label>Nama Pemilihan:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tanggal Mulai:</label>
        <input type="datetime-local" name="start" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tanggal Selesai:</label>
        <input type="datetime-local" name="end" class="form-control">
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
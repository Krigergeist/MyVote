@extends('layouts.admin')

@section('content') 
<main class="container py-4">
    <h3 class="mb-3">Tambah Jadwal</h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" class="row g-3" action="{{ route('schedule.store') }}" data-aos="fade-up">
    @csrf
    <div class="col-md-12">
      <label class="form-label">Nama Jadwal</label>
      <input type="text" name="scd_name" class="form-control" value="{{ old('scd_name') }}" required>
    </div>

      <div class="col-md-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="scd_deskripsi" class="form-control" rows="3">{{ old('scd_deskripsi') }}</textarea>
      </div>

      <div class="col-md-6">
        <label class="form-label">Mulai</label>
        <input type="datetime-local" name="scd_tanggal_mulai" class="form-control" value="{{ old('scd_tanggal_mulai') }}" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Selesai</label>
        <input type="datetime-local" name="scd_tanggal_selesai" class="form-control" value="{{ old('scd_tanggal_selesai') }}" required>
      </div>

      <div class="col-md-12">
        <label class="form-label">Status</label>
        <select name="scd_status" class="form-select" required>
          <option value="aktif" {{ old('scd_status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
          <option value="nonaktif" {{ old('scd_status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
        </select>
      </div>

      <div class="col-12 d-flex gap-2">
        <a href="{{ route('schedule.manage') }}" class="btn btn-light">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
</main>
@endsection

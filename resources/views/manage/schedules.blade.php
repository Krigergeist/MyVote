@extends('layouts.admin')

@section('content')
<div class="container my-4 container-narrow" style="height: 60vh;">
  <h2 class="text-center mb-4 fw-bold">Manage Scedules</h2>

  {{-- Baris Add + Search --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    {{-- Search bar di kiri --}}
    <div class="flex-grow-1 me-3">
      <div class="input-group">
        <span class="input-group-text">🔎</span>
        <input id="searchScedule" type="text" class="form-control" placeholder="Search schedule...">
      </div>
    </div>

    {{-- Tombol Add Scedule di kanan --}}
    <div>
      <a href="{{ route('schedule.store') }}" class="btn btn-primary">Add Schedule</a>
    </div>
  </div>

  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="sceduleTable">
        <thead class="table-light">
          <tr>
            <th>Nama</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Status</th>
            <th class="text-end">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($scedules as $scedule)
          <tr>
            <td>{{ $scedule->scd_name }}</td>
            <td>{{ \Carbon\Carbon::parse($scedule->scd_tanggal_mulai)->format('d M Y H:i') }}</td>
            <td>{{ \Carbon\Carbon::parse($scedule->scd_tanggal_selesai)->format('d M Y H:i') }}</td>
            <td>
              @php
                $now = \Carbon\Carbon::now();
                if ($now->lt($scedule->scd_tanggal_mulai)) {
                    $status = 'Belum Mulai';
                    $badge = 'secondary';
                } elseif ($now->between($scedule->scd_tanggal_mulai, $scedule->scd_tanggal_selesai)) {
                    $status = 'Sedang Berjalan';
                    $badge = 'success';
                } else {
                    $status = 'Selesai';
                    $badge = 'danger';
                }
              @endphp
              <span class="badge bg-{{ $badge }}">{{ $status }}</span>
            </td>
            <td class="text-end">
              <a href="{{ route('schedule.edit', $scedule->scd_id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
              <a href="{{ route('schedule.remove', $scedule->scd_id) }}" 
                 class="btn btn-sm btn-outline-danger"
                 onclick="return confirm('Yakin ingin menghapus jadwal {{ $scedule->scd_name }} ?')">Remove</a>
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
  document.getElementById("searchScedule").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#sceduleTable tbody tr");
    rows.forEach(row => {
      let text = row.innerText.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });
</script>
@endsection

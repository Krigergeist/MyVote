@extends('layouts.admin')

@section('content')
<div class="container my-4 container-narrow" style="min-height: 60vh;">
  <h2 class="text-center mb-4 fw-bold">Manage Accounts</h2>

  {{-- Notifikasi sukses --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  {{-- Baris Add Account + Search --}}
  <div class="d-flex justify-content-between align-items-center mb-3">
    {{-- Search bar di kiri --}}
    <div class="flex-grow-1 me-3">
      <div class="input-group">
        <span class="input-group-text">🔎</span>
        <input id="searchAccount" type="text" class="form-control" placeholder="Search name, email...">
      </div>
    </div>

    {{-- Tombol Add Account di kanan --}}
    <div>
      <a href="{{ route('account.add') }}" class="btn btn-primary">Add Account</a>
    </div>
  </div>

  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table align-middle mb-0" id="accountTable">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($accounts as $account)
          <tr>
            <td>{{ $account->usr_id }}</td>
            <td>{{ $account->usr_name }}</td>
            <td>{{ $account->usr_email }}</td>
            <td>{{ ucfirst($account->usr_role) }}</td>
            <td class="text-end">
              <a href="{{ route('account.edit', ['id' => $account->usr_id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
              <form action="{{ route('account.remove', ['id' => $account->usr_id]) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Yakin ingin menghapus akun {{ $account->usr_name }} ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted">Belum ada akun</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Script pencarian client-side --}}
<script>
  document.getElementById("searchAccount").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#accountTable tbody tr");
    rows.forEach(row => {
      let text = row.innerText.toLowerCase();
      row.style.display = text.includes(filter) ? "" : "none";
    });
  });
</script>
@endsection

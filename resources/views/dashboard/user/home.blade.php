@extends('layouts.user')
@php
  use Illuminate\Support\Facades\Auth;
@endphp
@section('content')
<main class="container py-4">
    <div class="row g-3">
      <div class="col-12 col-md-6" data-aos="fade-up">
        <div class="card shadow-sm h-100 rounded-4">
          <div class="card-body">
            <h5 class="card-title">Status Voting</h5>
            <p>Anda belum melakukan voting.</p>
            <a href="{{ route('vote.index') }}" class="btn btn-primary">
  Voting Sekarang
</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="card shadow-sm h-100 rounded-4">
          <div class="card-body">
            <h5 class="card-title">Jadwal Voting</h5>
            <p class="mb-1">Mulai: 01 Sep 2025</p>
            <p class="mb-3">Selesai: 03 Sep 2025</p>
            <div class="d-flex gap-2">
              <a href="results-user.html" class="btn btn-outline-secondary" data-nav>Lihat Hasil</a>
              <a href="{{ route('vote.index') }}" class="btn btn-outline-primary" data-nav>Lihat Kandidat</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12" data-aos="fade-up" data-aos-delay="150">
        <div class="alert alert-info rounded-4 mb-0">Tip: Anda dapat membuka menu melalui tombol ☰ di kiri atas.</div>
      </div>
    </div>
  </main>
@endsection

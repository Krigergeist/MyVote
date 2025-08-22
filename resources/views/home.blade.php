@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4" style="height: 60vh;">
  <section class="hero shadow-soft">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1 class="display-5 fw-bold">Suaramu menentukan masa depan.</h1>
        <p class="lead opacity-75">Ikut serta dalam pemilihan. Pilih kandidat terbaik, lihat hasil secara langsung, dan rasakan proses yang sederhana serta transparan.</p>
        <div class="mt-3">
          <a href="{{ route('login') }}" class="btn btn-light btn-lg me-2">Mulai Voting</a>
          <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Daftar</a>

        
        </div>
      </div>
      <div class="col-lg-5 text-center">
        <img class="hero-img" src="https://images.unsplash.com/photo-1556761175-4b46a572b786?q=80&w=1200&auto=format&fit=crop" alt="illustration">
      </div>
    </div>
  </section>
</div>
@endsection

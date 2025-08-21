@extends('layouts.app')

@section('content')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 shadow-soft text-center">
        <h3 class="mb-3">Verifikasi Akun</h3>
        <p>Terima kasih telah mendaftar. Silakan klik tombol di bawah untuk menyelesaikan verifikasi.</p>
        
        <form method="POST" action="{{ route('verify.process') }}">
          @csrf
          <button type="submit" class="btn btn-success w-100">
            Verifikasi & Login
          </button>
        </form>

        {{-- kalau mau tambah link request ulang verifikasi --}}
        {{-- 
        <form method="POST" action="{{ route('verify') }}" class="mt-3">
          @csrf
          <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            Klik di sini untuk meminta ulang verifikasi
          </button>
        </form>
        --}}
        
      </div>
    </div>
  </div>
</div>
@endsection

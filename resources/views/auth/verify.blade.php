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
          <button type="submit" class="btn btn-success w-100">Verifikasi & Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

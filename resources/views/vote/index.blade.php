@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $isAdmin = $user && $user->usr_role === 'student_affairs';
@endphp

@extends($isAdmin ? 'layouts.admin' : 'layouts.user')

@section('content')
<main class="container py-4">
    <h3 class="mb-3" data-aos="fade-up">Pilih Kandidat</h3>

    <div class="row g-3">
        @foreach($candidates as $index => $candidate)
            <div class="col-12 col-sm-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}">
                <div class="card shadow-sm rounded-4 h-100">
                    <img src="{{ $candidate->cdt_photo ? asset('storage/'.$candidate->cdt_photo) : 'https://picsum.photos/seed/cand'.$index.'/600/400' }}" 
                         class="card-img-top" alt="{{ $candidate->cdt_name }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $candidate->cdt_name }}</h5>
                        <p class="card-text small text-muted">{{ $candidate->cdt_desc ?? 'Visi belum tersedia' }}</p>

                        <div class="mt-auto d-grid">
                            @if($userHasVoted)
                                <button type="button" class="btn btn-secondary" disabled>Sudah Memilih</button>
                            @else
                                <form method="POST" action="{{ route('vote.vote', $candidate->cdt_id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection

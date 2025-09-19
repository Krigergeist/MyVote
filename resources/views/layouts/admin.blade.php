<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyVote • Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
    .card-img-top {
        padding: 2vh;
        height: 300px;
        object-fit: contain;
        width: 100%;
    }
    img {
        border-image: 2vh;
    }
  </style>
</head>
<body class="page page-enter">

  {{-- Navbar --}}
  <nav class="navbar navbar-dark bg-dark py-3 shadow-sm sticky-top">
    <div class="container-fluid">
      <button class="btn btn-outline-light me-2" data-bs-toggle="offcanvas" data-bs-target="#sidebarAdmin" aria-label="Open menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand fw-semibold" href="{{ route('dashboard.admin') }}">MyVote • Admin</a>
      <span class="badge bg-secondary d-none d-md-inline">kelola kandidat</span>
    </div>
  </nav>

  {{-- Sidebar --}}
  <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarAdmin">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Admin Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="list-group list-group-flush">
        <!-- <a href="#" class="list-group-item list-group-item-action">Profile</a> -->
        <a href="{{ route('dashboard.admin') }}" class="list-group-item list-group-item-action">Home</a>
        <a href="{{ route('vote.index') }}" class="list-group-item list-group-item-action">Voting</a>
        <!-- <a href="#" class="list-group-item list-group-item-action">Results</a> -->
        <div class="list-group-item">
          <div class="fw-semibold mb-2">Manage</div>
          <div class="d-grid gap-2">
            <a href="{{ route('candidate.index') }}" class="btn btn-outline-dark btn-sm">• Kandidat</a>
            <a href="{{ route('schedule.manage') }}" class="btn btn-outline-dark btn-sm">• Jadwal</a>
            <a href="{{ route('account.manage') }}" class="btn btn-outline-dark btn-sm">• Akun</a>
          </div>
        </div>
        {{-- Ganti link logout menjadi form POST --}}
        <form action="{{ route('logout') }}" method="POST" class="d-grid">
          @csrf
          <button type="submit" class="list-group-item list-group-item-action text-danger border-0 text-start">Logout</button>
        </form>
      </div>
    </div>
  </div>

  {{-- Konten Utama --}}
  <div class="container mt-4">
    @yield('content')
  </div>

  {{-- Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  {{-- Tempat script tambahan dari halaman child --}}
  @stack('scripts')
</body>
</html>

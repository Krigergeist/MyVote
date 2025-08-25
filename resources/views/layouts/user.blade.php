<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyVote • User Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="page page-enter">

  <nav class="navbar navbar-primary bg-primary py-3 shadow-sm sticky-top">
    <div class="container-fluid">
      <button class="btn btn-light me-2" data-bs-toggle="offcanvas" data-bs-target="#sidebarUser" aria-label="Open menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand text-white fw-semibold" href="dashboard-user.html" data-nav>MyVote • User</a>
      <span class="badge bg-light text-primary d-none d-md-inline">Dashboard</span>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarUser">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">User Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="list-group list-group-flush">
        <a href="{{ route('dashboard.user') }}" class="list-group-item list-group-item-action" data-nav>Home</a>
        <a href="profile-user.html" class="list-group-item list-group-item-action" data-nav>Profile</a>
        <a href="results-user.html" class="list-group-item list-group-item-action" data-nav>Lihat Hasil</a>
        <a href="{{ route('vote.index') }}" class="list-group-item list-group-item-action" data-nav>Voting Kandidat</a>
        <a href="{{ route('landing') }}" class="list-group-item list-group-item-action text-danger" data-nav>Logout</a>
      </div>
    </div>
  </div>

    <div class="container mt-4">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

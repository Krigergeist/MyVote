<!DOCTYPE html>
<html>
<head>
    <title>MyVote</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style=" zoom: 150%;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.html">Voting App</a>
    <div class="d-flex">
      <a href="login" class="btn btn-outline-light me-2">Login</a>
      <a href="register" class="btn btn-warning">Register</a>
    </div>
  </div>
</nav>

<div class="container mt-4" >
    @yield('content')
</div>

<footer class="footer-black pt-5 pb-3">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5 class="text-white">e-Voting System</h5>
        <p class="mb-0">Sistem pemilihan kandidat online yang aman, cepat, dan transparan.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="text-white">Contact Us</h5>
        <p class="mb-1">Jl. Contoh No. 123, Jakarta</p>
        <p class="mb-1">support@evoting.com</p>
        <p class="mb-0">+62 812-3456-7890</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5 class="text-white">Follow Us</h5>
        <a href="#" class="me-3 text-white">Facebook</a>
        <a href="#" class="me-3 text-white">Twitter</a>
        <a href="#" class="text-white">Instagram</a>
      </div>
    </div>
    <hr class="border-secondary">
    <div class="text-center">
      <small>© 2025 e-Voting. All Rights Reserved.</small>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
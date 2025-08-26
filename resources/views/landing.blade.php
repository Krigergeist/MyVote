<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teagle • MyVote</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      scroll-behavior: smooth;
    }
    .hero {
      background: url('assets/teagle.png') center/cover no-repeat;
      height: 100vh;
      color: white;
      display: flex;
      align-items: center;
      text-align: center;
      position: relative;
    }
    .hero::after {
      content: "";
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(0,0,0,0.6);
    }
    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 700px;
      margin: 0 auto;
    }
    .feature-icon {
      font-size: 2rem;
      color: #0d6efd;
    }
    footer {
      background: #0d0d0d;
      color: #bbb;
    }
    footer a { color: #fff; text-decoration: none; }
    footer a:hover { text-decoration: underline; }
      .footer {
    background: #0d0d0d;
    color: #bbb;
  }
  .footer h5, .footer h6 {
    color: #fff;
  }
  .footer a {
    color: #bbb;
    text-decoration: none;
    transition: color 0.3s;
  }
  .footer a:hover {
    color: #0d6efd;
  }
  .footer .social {
    font-size: 1.3rem;
    color: #bbb;
  }
  .footer .social:hover {
    color: #0d6efd;
  }
  .footer {
    background: #0d0d0d;
    color: #fff;
  }
  .footer h5, 
  .footer h6,
  .footer p,
  .footer a {
    color: #fff !important;
  }
  .footer a:hover {
    color: #0d6efd !important;
  }
  .footer .social {
    font-size: 1.3rem;
    color: #fff !important;
  }
  .footer .social:hover {
    color: #0d6efd !important;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Teagle • MyVote</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item"><a class="btn btn-primary ms-lg-3" href="index.html">Get Started</a></li>
      </ul>
    </div>
  </div>
</nav>
<section class="hero">
  <div class="hero-content animate__animated animate__fadeInUp">
    <h1 class="display-4 fw-bold">Secure. Simple. Smart.</h1>
    <p class="lead">MyVote by Teagle helps organizations run safe, transparent, and digital elections.</p>
    <a href="{{ route('login') }}" class="btn btn-lg btn-success mt-3">Get Started</a>
  </div>
</section>
<section id="features" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-5">Why Choose MyVote?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded bg-white h-100">
          <div class="feature-icon mb-3">🔒</div>
          <h5 class="fw-semibold">Teknologi Aman & Modern</h5>
          <p class="text-muted">Menggunakan sistem berbasis teknologi terkini untuk pengalaman e-voting yang aman dan transparan.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded bg-white h-100">
          <div class="feature-icon mb-3">⚡</div>
          <h5 class="fw-semibold">Real-Time & Akurat</h5>
          <p class="text-muted">Setiap suara dihitung secara instan dengan hasil yang tepat dan dapat dipercaya.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded bg-white h-100">
          <div class="feature-icon mb-3">🎨</div>
          <h5 class="fw-semibold">Desain Sesuai Kebutuhan</h5>
          <p class="text-muted">Tampilan dan fitur yang dapat disesuaikan sesuai kebutuhan organisasi Anda.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="about" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <img src="assets/file_00000000a2fc61f4b60b5121bdd0d3f7.png" class="img-fluid rounded shadow" alt="About MyVote">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold">About Teagle</h2>
        <p class="text-muted">Teagle adalah perusahaan jasa pengembangan website dan aplikasi digital yang berfokus pada solusi myvote dan sistem informasi modern. Berlokasi di Kp. Bojong, Desa Sukamukti, Kec. Katapang, kami menghadirkan platform pemilihan berbasis web dan mobile yang aman, praktis, dan transparan untuk berbagai kebutuhan.mulai dari pemilihan internal, ketua OSIS, kepala sekolah, hingga organisasi lainnya</p>
      </div>
    </div>
  </div>
</section>
<section id="contact" class="py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Get in Touch</h2>
    <p class="mb-5 text-muted">Have questions or need support? We’re here to help.</p>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="text-start">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Your Name">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="your@email.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="4" placeholder="Write your message..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-100">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>
<footer class="footer mt-5 pt-5">
  <div class="container">
    <div class="row gy-4">
      <div class="col-md-4">
        <h5 class="fw-bold text-white">Teagle • MyVote</h5>
        <p class="text-muted">Empowering secure and transparent digital voting for organizations worldwide.</p>
      </div>
      <div class="col-md-4">
        <h6 class="fw-semibold text-white">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="#features">Features</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="fw-semibold text-white">Contact</h6>
        <p class=" mb-1">📧 Teagleoff@gmail.com</p>
        <p class=" mb-1">📞 +62 897 9073 873</p>
        <div class="d-flex gap-3 mt-2">
          <a href="https://www.instagram.com/teagleoff/?utm_source=ig_web_button_share_sheet" class="social "><i class="bi bi-instagram"></i> Teagleoff</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

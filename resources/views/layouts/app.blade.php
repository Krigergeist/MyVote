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

<div class="container mt-4" >
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
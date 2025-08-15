@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    
:root{ --radius: 16px; }
html,body{ background:#f7f8fb; }
.navbar-brand{ font-weight:700; letter-spacing:.3px }
.card{ border-radius: var(--radius); }
.hero{
  background: linear-gradient(135deg,#0d6efd 0%,#6610f2 100%);
  color:#fff; border-radius:22px; padding:64px 28px;
  position:relative; overflow:hidden;
}
.hero::after{
  content:""; position:absolute; inset:0;
  background: radial-gradient(600px 200px at 80% 10%, rgba(255,255,255,.15), transparent 40%);
  pointer-events:none;
}
.hero-img{ max-width:420px; border-radius:18px; box-shadow:0 20px 40px rgba(0,0,0,.25) }
.feature-card{ border-radius:18px }
.sidebar-sticky{ position:sticky; top:1rem }
.list-group-item{ border-radius:12px; margin-bottom:.5rem }
.avatar-sm{ width:46px; height:46px; object-fit:cover; border-radius:10px; border:1px solid #e5e7eb }
.avatar-md{ width:120px; height:120px; object-fit:cover; border-radius:12px; border:1px solid #e5e7eb }
.dropzone{
  border:2px dashed #ced4da; border-radius:12px; padding:20px;
  background:#fff; color:#6c757d; text-align:center; cursor:pointer;
}
.dropzone.dragover{ background:#e9f5ff; border-color:#0d6efd; color:#0d6efd }
.shadow-soft{ box-shadow:0 12px 28px rgba(0,0,0,.08) }
footer.footer-black{ background:#000; color:#fff; }
footer.footer-black a{ color:#fff; text-decoration:none; }
footer .bi{ vertical-align: -0.125em; }
.container-narrow{ max-width: 980px; }
</style>


<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 shadow-soft">
        <h3 class="mb-3 text-center">Login</h3>
        <form id="loginForm">
          <div class="mb-3"><label>Email</label><input type="email" id="loginEmail" class="form-control" required></div>
          <div class="mb-3"><label>Password</label><input type="password" id="loginPassword" class="form-control" required></div>
          <button class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Belum punya akun? <a href="register.blade.php">Register</a></p>
      </div>
    </div>
  </div>
</div>
<script>
document.getElementById('loginForm').addEventListener('submit', function(e){
  e.preventDefault();
  const email = document.getElementById('loginEmail').value;
  const password = document.getElementById('loginPassword').value;
  const user = JSON.parse(localStorage.getItem('user')||'null');
  if(user && user.email===email && user.password===password){
    localStorage.setItem('loggedInUser', JSON.stringify(user));
    if(user.role==='admin'){ 
      location.href='admin-manage.html'; 
    } else { 
      if(localStorage.getItem('hasVoted:'+email)==='true'){ 
        alert('Anda sudah voting. Menampilkan hasil.');
        location.href='results.html'; 
      } else { 
        location.href='voting.html'; 
      }
    }
  } else {
    alert('Invalid credentials');
  }
});
</script>
@endsection


@extends('layouts.app')

@section('content')



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
        <p class="mt-3 text-center">Belum punya akun? <a href="/register">Register</a></p>
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


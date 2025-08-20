@extends('layouts.app')

@section('content')
<div class="container my-4">
  <div class="row">
    <div class="col-md-3 position-relative">
      <div class="card p-3 sidebar sidebar-sticky">
        <div class="d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Menu</h6>
          <a id="adminLink" class="d-none" href="admin-manage.html">Admin</a>
        </div>
        <hr>
        <div class="list-group">
          <a href="index.html" class="list-group-item list-group-item-action">Home</a>
          <a href="voting.html" class="list-group-item list-group-item-action active">Voting</a>
          <a href="results.html" id="resultsLinkAdmin" class="list-group-item list-group-item-action d-none">Hasil Voting</a>
          <a href="results.html" class="list-group-item list-group-item-action">Results</a>
          <a href="login.html" onclick="logout()" class="list-group-item list-group-item-action text-danger">Logout</a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row" id="votingGrid"></div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
  (function(){ const u=JSON.parse(localStorage.getItem('loggedInUser')||'null'); if(u && localStorage.getItem('hasVoted:'+u.email)==='true'){ alert('Anda sudah melakukan voting. Menampilkan hasil voting.'); location.href='results.html'; } })();
</script>
@endsection
    
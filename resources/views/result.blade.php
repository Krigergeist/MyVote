@extends('layouts.user')
@section('content')
<main class="container py-4">
    <div class="row g-3">
      <div class="col-12 col-lg-6" data-aos="fade-right">
        <div class="card shadow-sm rounded-4 h-100">
          <div class="card-body">
            <h5 class="card-title">Grafik Hasil</h5>
            <canvas id="resultsChart" height="160"></canvas>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6" data-aos="fade-left">
        <div class="card shadow-sm rounded-4 h-100">
          <div class="card-body">
            <h5 class="card-title">Tabel Hasil</h5>
            <div class="table-responsive">
              <table class="table table-hover align-middle">
                <thead class="table-light"><tr><th>Kandidat</th><th>Suara</th><th>Persentase</th></tr></thead>
                <tbody>
                  <tr><td>Kandidat 1</td><td>40</td><td>40%</td></tr>
                  <tr><td>Kandidat 2</td><td>35</td><td>35%</td></tr>
                  <tr><td>Kandidat 3</td><td>25</td><td>25%</td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@extends('layouts.admin')

@section('content')
<main class="container py-4">
  <div class="row g-3">
    <div class="col-6 col-lg-3" data-aos="zoom-in">
      <div class="card shadow-sm stat-card border-0 rounded-4">
        <div class="card-body">
          <div class="h6 text-muted">Kandidat</div>
          <div class="display-6 fw-bold">{{ $kandidatCount }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="50">
      <div class="card shadow-sm stat-card border-0 rounded-4">
        <div class="card-body">
          <div class="h6 text-muted">Akun</div>
          <div class="display-6 fw-bold">{{ $akunCount }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
      <div class="card shadow-sm stat-card border-0 rounded-4">
        <div class="card-body">
          <div class="h6 text-muted">Vote Masuk</div>
          <div class="display-6 fw-bold">{{ $votes->sum('total_votes') }}</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3" data-aos="zoom-in" data-aos-delay="150">
      <div class="card shadow-sm stat-card border-0 rounded-4">
        <div class="card-body">
          <div class="h6 text-muted">Golput</div>
          <div class="display-6 fw-bold">{{ $golputCount }}</div>
        </div>
      </div>
    </div>
    <div class="col-12" data-aos="fade-up" data-aos-delay="200">
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
          <h5 class="card-title">Hasil Voting Sementara</h5>
          <canvas id="voteChart" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
</main>
@push('scripts')
<script>
const ctx = document.getElementById('voteChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($chartLabels),
        datasets: [{
            label: 'Jumlah Suara',
            data: @json($chartData),
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', 
                '#9966FF', '#FF9F40', '#FF6384', '#C9CBCF'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.label || '';
                        let value = context.raw || 0;
                        let total = context.dataset.data.reduce((a, b) => a + b, 0);
                        let percentage = ((value / total) * 100).toFixed(1);
                        return `${label}: ${value} suara (${percentage}%)`;
                    }
                }
            }
        }
    }
});
</script>
@endpush
@endsection

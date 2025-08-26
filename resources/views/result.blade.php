@extends('layouts.user')
@section('content')
<main class="container py-4">
    <div class="row g-3">
      <div class="col-12 col-lg-6" data-aos="fade-right">
        <div class="card shadow-sm rounded-4 h-100">
          <div class="card-body">
            <h5 class="card-title">Grafik Hasil</h5>
            <canvas id="resultsChart" height="40"></canvas>
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
                  @php
                    $totalVotes = array_sum($voteData);
                  @endphp
                  @foreach($voteData as $candidateName => $votes)
                  <tr>
                    <td>{{ $candidateName }}</td>
                    <td>{{ $votes }}</td>
                    <td>{{ $totalVotes > 0 ? round(($votes / $totalVotes) * 100, 2) : 0 }}%</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <style>
    #resultsChart {
      max-height: 300px !important;
      max-width: 400px !important;
    }
  </style>
  
  <script>
    // Chart.js implementation for results
    document.addEventListener('DOMContentLoaded', function() {
      const ctx = document.getElementById('resultsChart').getContext('2d');
      
      // Get data from PHP variables
      const chartLabels = JSON.parse('<?php echo json_encode(array_keys($voteData)) ?>');
      const chartData = JSON.parse('<?php echo json_encode(array_values($voteData)) ?>');
      
      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: chartLabels,
          datasets: [{
            label: 'Jumlah Suara',
            data: chartData,
            backgroundColor: [
              'rgba(255, 99, 132, 0.7)',
              'rgba(54, 162, 235, 0.7)',
              'rgba(255, 206, 86, 0.7)',
              'rgba(75, 192, 192, 0.7)',
              'rgba(153, 102, 255, 0.7)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom',
            },
            tooltip: {
              callbacks: {
                label: function(context) {
                  const label = context.label || '';
                  const value = context.raw || 0;
                  const total = context.dataset.data.reduce((a, b) => a + b, 0);
                  const percentage = ((value / total) * 100).toFixed(2);
                  return `${label}: ${value} suara (${percentage}%)`;
                }
              }
            }
          }
        }
      });
    });
  </script>
@endsection

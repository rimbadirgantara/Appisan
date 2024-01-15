@extends('adminPages.adminLayouts')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i>
  <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Halo {{Auth::user()->username}}</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
    </h5>
    <p class="mb-0">Kamu seorang {{Auth::user()->level}}, ayok semangat !</p>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 mt-1">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ asset('adminTemplate')}}/assets/img/icons/spot-illustrations/corner-1.png);">
      </div>
      <!--/.bg-holder-->

      <div class="card-body position-relative">
        <h6>Total Siswa</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-danger" data-countup='{"endValue":{{$totalSiswa}},"decimalPlaces":0,"suffix":" Siswa"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="{{route('admin.siswa')}}">Lihat<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mt-1">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ asset('adminTemplate')}}/assets/img/icons/spot-illustrations/corner-2.png);">
      </div>
      <!--/.bg-holder-->

      <div class="card-body position-relative">
        <h6>Siswa Laki-Laki</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":{{$siswaLaki}},"decimalPlaces":0,"suffix":" Siswa"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="{{route('admin.siswa')}}">Lihat<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mt-1">
    <div class="card overflow-hidden" style="min-width: 12rem">
      <div class="bg-holder bg-card" style="background-image:url({{ asset('adminTemplate')}}/assets/img/icons/spot-illustrations/corner-3.png);">
      </div>
      <!--/.bg-holder-->

      <div class="card-body position-relative">
        <h6>Siswa Perempuan</h6>
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-success" data-countup='{"endValue":{{$siswaPerempuan}},"decimalPlaces":0,"suffix":" Siswa"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="{{route('admin.siswa')}}">Lihat<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">

  {{-- siwa --}}
  <div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Calon Mahasiswa</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <canvas id="barChart"></canvas>
      </div>
    </div>
  </div>

  {{-- guru --}}
  <div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Guru</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <canvas id="guruBarChart"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  {{-- siswa --}}
  <div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Siswa per sekolah</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <canvas id="polarChart"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  var barChart = document.getElementById('barChart').getContext('2d');
  var myChart = new Chart(barChart, {
      type: 'bar',
      data: {
          labels: @json($labelBar),
          datasets: [{
              label: 'Calon Siswa',
              data: @json($dataBarChart),
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>

<script>
  var guruBarChart = document.getElementById('guruBarChart').getContext('2d');
  var myChart = new Chart(guruBarChart, {
      type: 'bar',
      data: {
          labels: @json($labelGuru),
          datasets: [{
              label: 'Guru',
              data: @json($dataGuru),
              backgroundColor: 'rgba(255, 206, 86, 0.2)',
              borderColor: 'rgba(255, 206, 86, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>

<script>
  var polarChart = document.getElementById('polarChart').getContext('2d');
  var myChart = new Chart(polarChart, {
      type: 'polarArea',
      data: {
          labels: @json($labelPie),
          datasets: [{
              data: @json($dataPieChart),
              backgroundColor: [
                  'rgba(255, 99, 132, 0.7)',
                  'rgba(54, 162, 235, 0.7)',
                  'rgba(99, 255, 128, 0.7)',
                  'rgba(255, 99, 226, 0.7)',
                  'rgba(255, 159, 99, 0.7)',
                  'rgba(255, 206, 86, 0.7)',
                  'rgba(75, 192, 192, 0.7)',
                  'rgba(153, 102, 255, 0.7)',
              ],
              borderColor: [
                'rgba(255, 99, 132, 0.7)',
                  'rgba(54, 162, 235, 0.7)',
                  'rgba(99, 255, 128, 0.7)',
                  'rgba(255, 99, 226, 0.7)',
                  'rgba(255, 159, 99, 0.7)',
                  'rgba(255, 206, 86, 0.7)',
                  'rgba(75, 192, 192, 0.7)',
                  'rgba(153, 102, 255, 0.7)',
              ],
              borderWidth: 1
          }]
      },
  });
</script>
@endsection
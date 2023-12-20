@extends('userPages.UserLayouts')
@section('content')
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
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-danger" data-countup='{"endValue":{{$totalSiswa}},"decimalPlaces":0,"suffix":" Siswa"}'>0</div>
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
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":{{$siswaLaki}},"decimalPlaces":0,"suffix":" Siswa"}'>0</div>
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
        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-success" data-countup='{"endValue":{{$siswaPerempuan}},"decimalPlaces":0,"suffix":" Siswa"}'>0</div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-lg">
    <div class="card mb-3">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Siswa / Sekolah</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <div class="echart-bar-top-products h-100" data-echart-responsive="true"></div>
      </div>
    </div>
  </div>
</div>
@endsection
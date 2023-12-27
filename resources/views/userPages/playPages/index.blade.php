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

{{-- form tambah siswa --}}
<div class="row mt-3">
  <div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Tambah Siswa</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <form action="/guru/siswa/tambah" method="post">
          @csrf
          <div class="row align-items-center">
            <div class="row">
              <div class="col-lg">
                <div class="mb-3">
                  <label class="form-label" for="nama">Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    type="text" required value="{{old('nama')}}" />
                </div>
                <span class="text-danger">
                  @error('nama')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg">
                <div class="mb-3">
                  <label class="form-label" for="kelas">Kelas</label>
                  <input class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas"
                    type="text" required value="{{old('kelas')}}" />
                </div>
                <span class="text-danger">
                  @error('kelas')
                  {{ $message }}
                  @enderror
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg">
                <div class="mb-3">
                  <label for="jenisKelamin">Jeni Kelamin</label>
                  <select class="form-select" name="jenis_kelamin" id="jenisKelamin"
                    aria-label="Default select example">
                    <option selected="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  <span class="text-danger">
                    @error('jenis_kelamin')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-success mb-3">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="card mb-3">
      <div class="card-header bg-light py-2">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Daftar Siswa</h6>
          </div>
        </div>
      </div>
      <div class="card-body h-100">
        <div class="table-responsive scrollbar">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th class="text-end" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataSiswa as $i => $du)
                <tr>
                  <td>{{$du->nama_siswa}}</td>
                  <td>{{$du->nama_sekolah}}</td>
                  <td class="text-end">
                    <div class="dropdown font-sans-serif position-static">
                      <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                      <div class="dropdown-menu dropdown-menu-end border py-0">
                        <div class="bg-white py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
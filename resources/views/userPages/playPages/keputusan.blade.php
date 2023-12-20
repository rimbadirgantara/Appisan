@extends('userPages.UserLayouts')
@section('content')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i>
    <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">{{$title}}</span><span
        class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
    </h5>
    <p class="mb-0"><a href="{{route('siswa.index')}}">Siswa</a> / {{$title}}</p>
  </div>
</div>

<div class="card">
  <div class="card-body overflow-hidden">
    <div class="">
      @if (Session::get('failed'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
      </div>
      @endif
      @if (Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
      </div>
      @endif

      <form action="/siswa/doKeputusan" method="post">
        @csrf
        {{-- TI --}}
        <div>
          <h4>Teknik Informatika</h4>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="biaya">Biaya Kuliah</label>
                <select class="form-select" name="biaya_TI" id="biaya" aria-label="Default select example">
                  <option selected="" value="0">Pilih Biaya Kuliah</option>
                  <option value="1">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="2">Rp 3.000.000 - Rp 4.000.000</option>
                  <option value="3">Rp 4.000.000 - Rp 5.000.000</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="PenghasilanOrangTua">Penghasilan Orang Tuan</label>
                <select class="form-select" name="penghasilan_orang_tua_TI" id="PenghasilanOrangTua"
                  aria-label="Default select example">
                  <option selected="" value="0">Pilih Penghasilan Orang Tua</option>
                  <option value="1">
                    < Rp 1.000.000</option>
                  <option value="2">Rp 1.000.000 - Rp 2.000.000</option>
                  <option value="3">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="4">Rp 4.000.000 - Rp 5.000.000</option>
                  <option value="5">Rp 5.000.000 ></option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="beasiswa">Beasiswa</label>
                <select class="form-select" name="beasiswa_TI" id="beasiswa" aria-label="Default select example">
                  <option selected="" value="0">Pilih Beasiswa</option>
                  <option value="1">Kabupaten</option>
                  <option value="2">Provinsi</option>
                  <option value="3">KIP</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" for="ormas">Kegiatan Mahasiswa</label>
                <select class="form-select" name="ormas_TI" id="ormas" aria-label="Default select example">
                  <option selected="" value="0">Pilih Kegiatan</option>
                  <option value="1">Himpunan</option>
                  <option value="2">UKM</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" for="akreditasi">Akreditasi</label>
                <select class="form-select" name="akreditasi_TI" id="akreditasi" aria-label="Default select example">
                  <option selected="" value="0">Pilih Akreditasi</option>
                  <option value="1">Akreditasi B</option>
                  <option value="2">Akreditasi A</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr>

        {{-- Mesin --}}
        <div>
          <h4>Teknik Mesin</h4>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="biaya">Biaya Kuliah</label>
                <select class="form-select" name="biaya_MESIN" id="biaya" aria-label="Default select example">
                  <option selected="" value="0">Pilih Biaya Kuliah</option>
                  <option value="1">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="2">Rp 3.000.000 - Rp 4.000.000</option>
                  <option value="3">Rp 4.000.000 - Rp 5.000.000</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="PenghasilanOrangTua">Penghasilan Orang Tuan</label>
                <select class="form-select" name="penghasilan_orang_tua_MESIN" id="PenghasilanOrangTua"
                  aria-label="Default select example">
                  <option selected="" value="0">Pilih Penghasilan Orang Tua</option>
                  <option value="1">
                    < Rp 1.000.000</option>
                  <option value="2">Rp 1.000.000 - Rp 2.000.000</option>
                  <option value="3">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="4">Rp 4.000.000 - Rp 5.000.000</option>
                  <option value="5">Rp 5.000.000 ></option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="beasiswa">Beasiswa</label>
                <select class="form-select" name="beasiswa" id="beasiswa_MESIN" aria-label="Default select example">
                  <option selected="" value="0">Pilih Beasiswa</option>
                  <option value="1">Kabupaten</option>
                  <option value="2">Provinsi</option>
                  <option value="3">KIP</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" for="ormas">Kegiatan Mahasiswa</label>
                <select class="form-select" name="ormas_MESIN" id="ormas" aria-label="Default select example">
                  <option selected="" value="0">Pilih Kegiatan</option>
                  <option value="1">Himpunan</option>
                  <option value="2">UKM</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" for="akreditasi">Akreditasi</label>
                <select class="form-select" name="akreditasi_MESIN" id="akreditasi" aria-label="Default select example">
                  <option selected="" value="0">Pilih Akreditasi</option>
                  <option value="1">Akreditasi B</option>
                  <option value="2">Akreditasi A</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr>

        {{-- ADM --}}
        <div>
          <h4>Teknik Administrasi Bisnis</h4>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="biaya">Biaya Kuliah</label>
                <select class="form-select" name="biaya_ADM" id="biaya" aria-label="Default select example">
                  <option selected="" value="0">Pilih Biaya Kuliah</option>
                  <option value="1">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="2">Rp 3.000.000 - Rp 4.000.000</option>
                  <option value="3">Rp 4.000.000 - Rp 5.000.000</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="PenghasilanOrangTua">Penghasilan Orang Tuan</label>
                <select class="form-select" name="penghasilan_orang_tua_ADM" id="PenghasilanOrangTua"
                  aria-label="Default select example">
                  <option selected="" value="0">Pilih Penghasilan Orang Tua</option>
                  <option value="1">
                    < Rp 1.000.000</option>
                  <option value="2">Rp 1.000.000 - Rp 2.000.000</option>
                  <option value="3">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="4">Rp 4.000.000 - Rp 5.000.000</option>
                  <option value="5">Rp 5.000.000 ></option>
                </select>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="beasiswa">Beasiswa</label>
                <select class="form-select" name="beasiswa_ADM" id="beasiswa" aria-label="Default select example">
                  <option selected="" value="0">Pilih Beasiswa</option>
                  <option value="1">Kabupaten</option>
                  <option value="2">Provinsi</option>
                  <option value="3">KIP</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" for="ormas">Kegiatan Mahasiswa</label>
                <select class="form-select" name="ormas_ADM" id="ormas" aria-label="Default select example">
                  <option selected="" value="0">Pilih Kegiatan</option>
                  <option value="1">Himpunan</option>
                  <option value="2">UKM</option>
                </select>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label class="form-label" for="akreditasi">Akreditasi</label>
                <select class="form-select" name="akreditasi_ADM" id="akreditasi" aria-label="Default select example">
                  <option selected="" value="0">Pilih Akreditasi</option>
                  <option value="1">Akreditasi B</option>
                  <option value="2">Akreditasi A</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-success">Kalkulasi kan bro !</button>
      </form>
    </div>
  </div>
</div>
@endsection
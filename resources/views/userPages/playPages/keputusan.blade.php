@extends('userPages.UserLayouts')
@section('content')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i>
    <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">{{$title}}</span><span
        class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
    </h5>
    <p class="mb-0"><a href="{{route('guru.index')}}">Siswa</a> / {{$title}}</p>
  </div>
</div>

<div class="card">
  <div class="card-body overflow-hidden">
    <div class="">
      <form action="/guru/prekalkulasi" method="post">
        @csrf
        <h5>Alternatif & Kriteria</h5>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="namaSiswa">Nama Siswa</label>
                <select class="form-select @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="namaSiswa" aria-label="Default select example">
                  <option selected="" value="">Pilih Siswa</option>
                  @foreach ($dataSiswa as $ds)
                    <option value="{{$ds->id_siswa}}">{{$ds->nama_siswa}}</option>
                  @endforeach
                </select>
                @error('nama_siswa')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="PenghasilanOrangTua">Penghasilan Orang Tuan</label>
                <select class="form-select @error('penghasilan_orang_tua') is-invalid @enderror" name="penghasilan_orang_tua" id="PenghasilanOrangTua"
                  aria-label="Default select example">
                  <option selected="" value="">Pilih Penghasilan Orang Tua</option>
                  <option value="1">
                    Kurang Dari Rp 1.000.000</option>
                  <option value="2">Rp 1.000.000 - Rp 2.000.000</option>
                  <option value="3">Rp 2.000.000 - Rp 3.000.000</option>
                  <option value="4">Rp 3.000.000 - Rp 4.000.000</option>
                  <option value="5">Lebih Dari Rp 5.000.000</option>
                </select>
                @error('penghasilan_orang_tua')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="akreditas">Akreditas</label>
                <select class="form-select @error('akreditas') is-invalid @enderror" name="akreditas" id="akreditas" aria-label="Default select example">
                  <option selected="" value="">Pilih Akreditas</option>
                  <option value="1">Akreditas B</option>
                  <option value="2">Akreditas A</option>
                </select>
                @error('akreditas')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="beasiswa">Beasiswa</label>
                <select class="form-select @error('beasiswa') is-invalid @enderror" name="beasiswa" id="beasiswa" aria-label="Default select example">
                  <option selected="" value="">Pilih Beasiswa</option>
                  <option value="0">Tidak Ada</option>
                  <option value="1">Kabupaten</option>
                  <option value="2">Provinsi</option>
                  <option value="3">KIP</option>
                </select>
                @error('beasiswa')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="ormas">Kegiatan Mahasiswa</label>
                <select class="form-select @error('ormas') is-invalid @enderror" name="ormas" id="PenghasilanOrangTua"
                  aria-label="Default select example">
                  <option selected="" value="">Pilih Kegiatan Mahasiswa</option>
                  <option value="1">UKM (Unit Kegiatan Mahasiswa)</option>
                  <option value="2">Himpunan</option>
                </select>
                @error('ormas')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="nilaiSemester">Nilai Semester 5</label>
                <select class="form-select @error('nilai_semester') is-invalid @enderror" name="nilai_semester" id="nilaiSemester" aria-label="Default select example">
                  <option selected="" value="">Pilih Range Nilai</option>
                  <option value="1">Kurang Dari 1000</option>
                  <option value="2">1000 - 1300</option>
                  <option value="3">Lebih Dari 1300</option>
                </select>
                @error('nilai_semester')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="prestasi">Prestasi Yang Pernah Diraih</label>
                <select class="form-select @error('prestasi') is-invalid @enderror" name="prestasi" id="prestasi" aria-label="Default select example">
                  <option selected="" value="">Pilih Prestasi</option>
                  <option value="0">Tidak Ada</option>
                  <option value="1">Kabupaten</option>
                  <option value="2">Provinsi</option>
                  <option value="3">Nasional</option>
                </select>
                @error('prestasi')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="fasilitas">Fasilitas</label>
                <select class="form-select @error('fasilitas') is-invalid @enderror" name="fasilitas" id="fasilitas" aria-label="Default select example">
                  <option selected="" value="">Pilih Fasilitas</option>
                  <option value="1">Cukup</option>
                  <option value="2">Baik</option>
                  <option value="3">Sangat Baik</option>
                </select>
                @error('fasilitas')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="col-lg-4">
              <div class="mb-3">
                <label class="form-label" for="dosen">Dosen</label>
                <select class="form-select @error('dosen') is-invalid @enderror" name="dosen" id="dosen" aria-label="Default select example">
                  <option selected="" value="">Pilih Dosen</option>
                  <option value="1">Dosen S2</option>
                  <option value="2">Dosen S3</option>
                </select>
                @error('dosen')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
          </div>
        <button class="btn btn-success">Tambahkan kan bro !</button>
      </form>
    </div>
  </div>
</div>

<div class="card mt-3">
  <div class="card-body overflow-hidden">
    <h5>Nama Masuk</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dataPrekalkulasi as $du)
        <tr>
          <td>{{$du['nama_siswa']}}</td>
          <td>
            <div>
              <a href="/guru/prekalkulasi/{{$du->id_prekalkulasi}}/hapus" class="btn btn-sm btn-danger" type="button"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-confirm-delete="true"><span
                  class="fas fa-trash-alt"></span></a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <a href="/guru/doKeputusan" class="btn btn-success">Tentukan !</a>
  </div>
</div>
@endsection
@extends('adminPages.adminLayouts')
@section('content')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i>
  <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Guru</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
    </h5>
    <p class="mb-0"><a href="/admin">Dashboard</a> / {{$title}}</p>
  </div>
</div>
<div class="card">
  <div class="card-body overflow-hidden">
    <div class="table-responsive scrollbar">
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
      <button class="btn btn-sm btn-success mt-3" data-bs-toggle="modal" data-bs-target="#tambah-user"><span
        class="fa fa-graduation-cap"></span> Tambah
        Siswa</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Tingkat</th>
            <th scope="col">Sekolah</th>
            <th class="text-end" scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataUser as $du)
          <tr>
            <td>{{$du['nama_siswa']}}
            </td>
            <td>Kelas {{$du['kelas']}}</td>
            <td>{{$du['nama_sekolah']}}</td>
            <td class="text-end">
              <div>
                <a href="/admin/siswa/{{$du['id_siswa']}}/edit" class="btn btn-sm btn-warning" type="button" title="Edit" data-bs-placement="top"
                  data-bs-toggle="tooltip" data-bs-target="#edit-user"><span class="fas fa-edit"></span></a>

                <a href="/admin/siswa/{{$du['id_siswa']}}/hapus" class="btn btn-sm btn-danger" type="button"
                  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-confirm-delete="true"><span
                    class="fas fa-trash-alt"></span></a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="tambah-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px">
    <div class="modal-content position-relative">
      <div class="modal-body p-0">
        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
          <h4 class="mb-1" id="modalExampleDemoLabel">Tambah Siswa</h4>
        </div>
        <div class="p-4 pb-0">
          <form action="/admin/siswa/tambah" method="post">
            @csrf
            <div class="row align-items-center">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="nama">Nama Siswa</label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                      type="text" required value="{{old('nama')}}" />
                  </div>
                  <span class="text-danger">
                    @error('nama')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="col-lg-6">
                  <label class="form-label" for="nama_sekolah">Nama Sekolah</label>
                  <select name="nama_sekolah" class="form-select @error('nama_sekolah') is-invalid @enderror">
                    <option selected="" {{ old('nama_sekolah') ? old('nama_sekolah') : '' }}></option>
                    @foreach ($listSekolah as $sklh)
                    <option value="{{$sklh['id_sekolah']}}">{{$sklh['nama_sekolah']}}</option>
                    @endforeach
                  </select>
                  @error('nama_sekolah')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="kelas">Kelas</label>
                    <input class="form-control @error('kelas') is-invalid @enderror" name="kelas" id="kelas" type="text"
                      required value="{{old('kelas')}}" />
                  </div>
                  <span class="text-danger">
                    @error('kelas')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
                <div class="col-lg-6">
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
  </div>
</div>

@endsection
@extends('adminPages.adminLayouts')
@section('content')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card"
    style="background-image:url({{asset('adminTemplate')}}/assets/img/icons/spot-illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

  <div class="card-body position-relative">
    <div class="row">
      <div class="col-lg-8">
        <h3>Update Untuk "{{$dataUser['username']}}"</h3>
      </div>
    </div>
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
      <form action="/admin/siswa/{{$dataUser['id_user']}}/doUpdate" method="post">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label" for="username">Username</label>
              <input class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                type="text" value="{{$dataUser['username']}}" />
              @error('username')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label" for="email">Email</label>
              <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text"
                value="{{$dataUser['email']}}" />
              @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label" for="nama_sekolah">Nama Sekolah</label>
              <select name="nama_sekolah" class="form-select @error('nama_sekolah') is-invalid @enderror">
                <option selected="" value="{{$dataUser['id_sekolah']}}">{{$dataUser['nama_sekolah']}}</option>
                @foreach ($listSekolah as $sklh)
                @if ($dataUser['nama_sekolah'] === $sklh['nama_sekolah'])
                @continue
                @endif
                <option value="{{ $sklh['id_sekolah'] }}">{{ $sklh['nama_sekolah'] }}</option>
                @endforeach
              </select>
              @error('nama_sekolah')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label" for="kelas">Kelas</label>
              <input class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" type="text"
                value="{{$dataUser['kelas']}}" />
              @error('kelas')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                <option selected="" value="{{$dataUser['jenis_kelamin']}}">{{$dataUser['jenis_kelamin']}}</option>
                @if ($dataUser['jenis_kelamin'] === 'Laki-laki')
                <option value="Perempuan">Perempuan</option>
                @elseif ($dataUser['jenis_kelamin'] === 'Perempuan')
                <option value="Laki-laki">Laki-Laki</option>
                @endif
              </select>
              @error('jenis_kelamin')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                type="password" />
              @error('password')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
          </div>
        </div>
        <button class="btn btn-warning">Edit !</button>
      </form>
    </div>
  </div>
</div>
@endsection
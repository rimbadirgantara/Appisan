@extends('authPages.authLayouts')
@section('content')
<body>

  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="container-fluid">
      <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
            src="adminTemplate/assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img
            class="bg-auth-circle-shape-2" src="adminTemplate/assets/img/icons/spot-illustrations/shape-1.png" alt=""
            width="150">
          <div class="card overflow-hidden z-index-1">
            <div class="card-body p-0">
              <div class="row g-0 h-100">
                <div class="col-md-5 text-center bg-card-gradient">
                  <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                    <div class="bg-holder bg-auth-card-shape"
                      style="background-image:url(adminTemplate/assets/img/icons/spot-illustrations/half-circle.png);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="z-index-1 position-relative"><a
                        class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder"
                        href="/">{{$appName}}</a>
                      <p class="opacity-75 text-white">{{$desk}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 d-flex flex-center">
                  <div class="p-4 p-md-5 flex-grow-1">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h3>Register Akun</h3>
                      </div>
                    </div>
                    <div class="row">
                      @if (Session::get('success'))
                        <div class="alert alert-success" role="alert">
                          {{Session::get('success')}}
                        </div>
                      @elseif (Session::get('failed'))
                        <div class="alert alert-danger" role="alert">
                          {{Session::get('failed')}}
                        </div>
                      @endif
                    </div>
                    <form method="post" action="/register" novalidate="">
                      @csrf
                      <div class="mb-3">                       
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control @error('username') is-invalid @enderror" name="username" id="username" type="text" autocomplete="off" autofocus value="{{old('username')}}"/>
                        @error('username')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">                       
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" autocomplete="off" autofocus value="{{old('email')}}"/>
                        @error('email')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <div class="row">
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

                          <div class="col-lg-6">
                            <label class="form-label" for="kelas">Kelas</label>
                            <input class="form-control @error('kelas') is-invalid @enderror" type="kelas" id="kelas" name="kelas" />
                            @error('kelas')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="row">
                          <div class="col-lg-6">
                            <label class="form-label" for="jenisKelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                              <option selected="" value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : '' }}"></option>
                              <option value="Laki-laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror                            
                          </div>

                          <div class="col-lg-6">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" />
                            @error('password')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Daftar</button>
                      </div>
                    </form>
                    <a href="{{route('login')}}">Login</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="adminTemplate/vendors/popper/popper.min.js"></script>
  <script src="adminTemplate/vendors/bootstrap/bootstrap.min.js"></script>
  <script src="adminTemplate/vendors/anchorjs/anchor.min.js"></script>
  <script src="adminTemplate/vendors/is/is.min.js"></script>
  <script src="adminTemplate/vendors/fontawesome/all.min.js"></script>
  <script src="adminTemplate/vendors/lodash/lodash.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="adminTemplate/vendors/list.js/list.min.js"></script>
  <script src="adminTemplate/assets/js/theme.js"></script>

</body>
@endsection
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
                        <h3>Login Akun</h3>
                      </div>
                      @if (Session::get('failed'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
                          </div>
                        @endif
                    </div>
                    <form method="post" action="/login" novalidate="">
                      <div class="mb-3">
                        @csrf
                        
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control @error('username') is-invalid @enderror" name="username" id="username" type="text" autocomplete="off" autofocus value="{{old('username')}}"/>
                        @error('username')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between">
                          <label class="form-label" for="card-password">Password</label>
                        </div>
                        <input class="form-control @error('password') is-invalid @enderror" id="card-password" type="password" name="password" />
                        @error('password')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                      </div>
                    </form>
                    <a href="{{route('register')}}">Register</a>
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
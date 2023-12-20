@extends('adminPages.adminLayouts')
@section('content')
<div class="card mb-3">
  <div class="card-header position-relative min-vh-25 mb-7">
    <div class="bg-holder rounded-3 rounded-bottom-0"
      style="background-image:url({{asset('adminTemplate')}}/assets/img/generic/4.jpg);">
    </div>
    <!--/.bg-holder-->

    <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
        src="{{asset('adminTemplate')}}/assets/img/profileImage/{{Auth::user()->profile_pict}}" width="200" alt="" /></div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h4 class="mb-1"> {{Auth::user()->username}} | {{Auth::user()->level}}
        </h4>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <h5 class="mb-0" data-anchor="data-anchor">Profile</h5>
  </div>
  <div class="card-body bg-light">
    <form action="/admin/profile/{{Auth::user()->id_user}}/update" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="row">
        <div class="row">
          <div class="col-lg-6">
            <label for="username">Username</label>
            <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{$dataUser['username']}}" />
            @error('username')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
          </div>
          <div class="col-lg-6">
            <label for="email">Email</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" value="{{$dataUser['email']}}" />
            @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <label for="profile">Foto Profile</label>
            <input class="form-control @error('profile') is-invalid @enderror" id="profile" name="profile" type="file" />
            @error('profile')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
          </div>
          <div class="col-lg-6">
            <label for="password">Password</label>
            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password"/>
            @error('password')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
          </div>
        </div>
        <button class="btn btn-warning mt-3">Update !</button>
      </div>
    </form>
  </div>
</div>
@endsection
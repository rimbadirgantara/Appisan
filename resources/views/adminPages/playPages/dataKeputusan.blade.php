@extends('adminPages.adminLayouts')
@section('content')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i>
  <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Siswa</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
    </h5>
    <p class="mb-0"><a href="/admin">Dashboard</a> / {{$title}}</p>
  </div>
</div>
<div class="card">
  <div class="card-body overflow-hidden">
    <div class="">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">Pilihan</th>
            <th scope="col">Nilai</th>
            <th class="text-end" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataUser as $du)
          <tr>
            <td>{{$du['username']}}</td>
            <td>{{$du['nama_jurusan']}}</td>
            <td>{{$du['nilai']}}</td>
            <td class="text-end">
              <div>
                <a href="/admin/siswa/keputusan/{{$du['id_user']}}/hapus" class="btn btn-sm btn-danger" type="button"
                  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-confirm-delete="true"><span
                    class="fas fa-trash-alt"></span></a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$dataUser->links()}}
    </div>
  </div>
</div>

@endsection
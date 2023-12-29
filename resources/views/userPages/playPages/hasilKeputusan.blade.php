@extends('userPages.UserLayouts')
@section('content')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i>
    <i class="fa-inverse fa-stack-1x text-primary fas fa-percentage"></i></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">{{$title}}</span><span
        class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
    </h5>
    <p class="mb-0"><a href="{{route('guru.index')}}">Guru</a> / {{$title}}</p>
  </div>
</div>

<div class="card">
  <div class="card-body overflow-hidden">
    <div class="table-responsive scrollbar">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Nama Jurusan</th>
            <th scope="col">Nilai</th>
            <th class="text-end" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataHasil as $num => $dh)
            <tr>
              <td>{{$num+1}}</td>
              <td>{{$dh->nama_siswa}}</td>
              <td>{{$dh->nama_jurusan}}</td>
              <td>{{$dh->nilai}}</td>
              <td class="text-end">
                <div>
                  <a href="/siswa/kalkulasi/{{$dh['id_user']}}/hapus" class="btn btn-sm btn-danger" type="button"
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
@endsection
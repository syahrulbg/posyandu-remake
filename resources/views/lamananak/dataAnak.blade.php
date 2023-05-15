@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Data Anak </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/data-anak">Data Anak</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Anak</li>
      </ol>
    </nav>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Anak</h4>
        <a href="{{ route('data-anak.create') }}"><button type="button" class="btn btn-primary btn-icon-text">
          <i class="mdi mdi-plus-box btn-icon-prepend"></i> Tambah data anak </button></a>
        </p>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Balita </th>
                <th> Nama Ibu </th>
                <th> Tanggal Lahir </th>
                <th> Jenis Kelamin </th>
                <th> Aksi </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($balitas as $balita)
              <tr>
                <td> {{ ++$i }} </td>
                <td> {{ $balita->nama_balita }} </td>
                <td> {{ $balita->ibu->name }} </td>
                <td> {{ $balita->tanggal_lahir }} </td>
                <td> {{ $balita->jenis_kelamin }} </td>
                <td class="text-center">
                  <form action="/data-anak/{{$balita->id}}" method="POST" onsubmit="return confirm('Apakah Anda Yakin?')">
    
                    <a class="btn btn-primary" href="/data-anak/{{$balita->id}}/edit" id="btn-dit">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" id="btn-del">Delete</button>
                </form>
              </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
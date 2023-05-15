@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Edit Profile </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/settings">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
      </ol>
    </nav>
  </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Edit Data Anak</h4>
        <p class="card-description"> Perhatikan data dengan teliti </p>
        @foreach ($user1 as $u)
        <form class="forms-sample" action="/settings/update/{{ $u->id }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Lengkap</label>
            <input class="form-control" type="text" value="{{ $u->name }}" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Alamat</label>
            <input class="form-control" type="text" value="{{ $u->alamat }}" name="alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">No Telepon</label>
            <input class="form-control" type="number" value="{{ $u->nomorHP }}" name="nomorHP">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Tanggal Lahir</label>
            <input type="date" value="{{ $u->ttl }}" name="ttl" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Jenis Kelamin</label>
            <input type="text" value="{{ $u->jenis_kelamin }}" name="jenis_kelamin" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          {{-- <a href=""><button class="btn btn-dark">Cancel</button></a> --}}
        </form>
        @endforeach
      </div>
    </div>
  </div>
@endsection
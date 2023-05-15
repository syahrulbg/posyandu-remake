@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Edit Data Anak </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/data-anak">Data Anak</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
      </ol>
    </nav>
  </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Edit Data Anak</h4>
        <p class="card-description"> Perhatikan data dengan teliti </p>
        @foreach ($balita as $b)
        <form class="forms-sample" action="/data-anak/{{$b->id}}" method="POST" enctype="multipart/form-data">            
            @csrf @method('PUT')
          <div class="form-group">
            <label for="exampleInputName1">Nama Balita</label>
            <input class="form-control" type="text" value="{{$b->nama_balita}}" name="nama_balita" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{$b->tanggal_lahir}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Jenis Kelamin</label>
            <input type="text" name="jenis_kelamin" value="{{$b->jenis_kelamin}}" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          {{-- <a href=""><button class="btn btn-dark">Cancel</button></a> --}}
        </form>
        @endforeach
      </div>
    </div>
  </div>
@endsection
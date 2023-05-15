@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Tambah Data Anak </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/data-anak">Data Anak</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
      </ol>
    </nav>
  </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Tambah Data Anak</h4>
        <p class="card-description"> Silahkan isi data dengan benar </p>
        <form class="forms-sample" action="{{ route('data-anak.store') }}" method="POST">
            @csrf
            <div class="form-group">
            <label for="exampleInputName1">Nama Lengkap</label>
            <input class="form-control" type="text" name="nama_balita" placeholder="Masukan nama lengkap">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Nama Ibu</label>
            <select class="form-control" id="exampleSelectGender" name="ibu_id">
              <option disabled focus>Pilih nama ibu</option>
              @foreach ($users as $b)
                @if ($b->role_id == '2')
                    <option value="{{ $b->ibu_id }}">{{ $b->ibu->name }}</option>
                @endif                               
              @endforeach
            </select>
          </div>
          <div class="form-group mb-1">
            <label for="exampleInputName1">Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="1"> Laki-Laki </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  {{-- <input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="1"> Laki-Laki </label> --}}
                <input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="2"> Perempuan </label>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          {{-- <a href=""><button class="btn btn-dark">Cancel</button></a> --}}
        </form>
      </div>
    </div>
  </div>
@endsection
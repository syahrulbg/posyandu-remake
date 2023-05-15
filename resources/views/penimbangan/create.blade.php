@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Tambah Data Penimbangan Anak </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/penimbangan">Penimbangan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Penimbangan Anak</li>
      </ol>
    </nav>
  </div>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Tambah Data Penimbangan Anak</h4>
        <p class="card-description"> Silahkan isi data dengan benar </p>
        <form class="forms-sample" action="{{ route('penimbangan.store') }}" method="POST">
            @csrf
          <div class="form-group">
            <label for="exampleSelectGender">Nama Balita</label>
            <select class="form-control" id="exampleSelectGender" name="balita_id">
              <option disabled>Pilih nama balita</option>
              @foreach ($balitas as $b)
                <option value="{{ $b->id }}">{{ $b->nama_balita }}</option>                              
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Nama ibu</label>
            <select class="form-control" id="exampleSelectGender" name="penimbangan_id">
              <option disabled focus>Pilih nama ibu</option>
              @foreach ($users as $b)
                @if ($b->role_id == '2')
                    <option value="{{ $b->ibu_id }}">{{ $b->ibu->name }}</option>
                @endif                               
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Tanggal Lahir</label>
            <input type="date" name="tanggal" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Berat Badan (Kg)</label>
            <input class="form-control" type="text" name="berat_badan" >
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Umur</label>
            <input class="form-control" type="text" name="umur" >
          </div>
          <div class="form-group mb-1">
            <label for="exampleInputName1">Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="laki-laki"> Laki-Laki </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                  {{-- <input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="1"> Laki-Laki </label> --}}
                <input type="radio" class="form-check-input" name="jenis_kelamin" id="optionsRadios1" value="perempuan"> Perempuan </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          {{-- <a href=""><button class="btn btn-dark">Cancel</button></a> --}}
        </form>
      </div>
    </div>
  </div>
@endsection
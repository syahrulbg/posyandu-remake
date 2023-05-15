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
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Balita </th>
                <th> Nama Ibu </th>
                <th> Tanggal Lahir </th>
                <th> Jenis Kelamin </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($balita as $b)
                <tr data-aos="fade-up">
                    <td data-title="No">1</td>
                    <td data-title="Nama Ibu">{{ $b->nama_balita }}</td>
                    <td data-title="Nama Balita">{{ $b->name }}</td>
                    <td data-title="Tanggal Lahir">{{ $b->tanggal_lahir }}</td>
                    <td data-title="Jenis Kelamin">{{ $b->jenis_kelamin }}</td>
                </tr>
                @endforeach 
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
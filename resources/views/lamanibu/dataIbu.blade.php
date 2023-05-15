@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Data Ibu </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/data-anak">Data Ibu</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Ibu</li>
      </ol>
    </nav>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Data Ibu</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Nama Balita</th>
                <th>Alamat</th>
                <th>Nomor Hp</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
              <tr>
                @foreach ($ibu as $u)
                        <tr data-aos="fade-up">
                        <td data-title="No"><?= $i++ ?></td>
                        <td data-title="Nama Lengkap">{{ $u->name }}</td>
                        <td data-title="Nama Balita">{{ $u->nama_balita}}</td>
                        <td data-title="Alamat">{{ $u->alamat }}</td>
                        <td data-title="Nomor Telepon">{{ $u->nomorHP }}</td>
                        <td data-title="Tanggal Lahir">{{ $u->ttl }}</td>
                        <td data-title="Jenis Kelamin">{{ $u->jenis_kelamin }}</td>
                    </tr>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
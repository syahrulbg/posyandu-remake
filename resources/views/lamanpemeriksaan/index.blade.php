@extends('Main.index')
@section('isi-halaman')
<div class="page-header">
    <h3 class="page-title"> Data Penimbangan </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/penimbangan">Penimbangan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Penimbangan</li>
      </ol>
    </nav>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Penimbangan</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th >No</th>
                <th >Tanggal Pemeriksaaan</th>
                <th >Nama Balita</th>
                <th >Berat Badan (Kg)</th>
                <th >Umur (Bulan)</th>
                <th >Jenis Kelamin</th>
                <th >Status</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($cek as $b)
                    <tr data-aos="fade-up">
                        <td data-title="No">1</td>
                        <td data-title="Tanggal Penimbangan">{{ $b->tanggal }}</td>
                        <td data-title="Nama Balita">{{ $b->nama_balita }}</td>
                        <td data-title="Umur">{{ $b->berat }}</td>
                        <td data-title="Tinggi Badan">{{ $b->p_umur }}</td>
                        <td data-title="Berat Badan">{{ $b->kelamin }}</td>
                        <td data-title="Status">{{ $b->status }}</td>
                    </tr>
                @endforeach  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
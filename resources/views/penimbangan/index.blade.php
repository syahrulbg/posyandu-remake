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
        <a href="{{ route('penimbangan.create') }}"><button type="button" class="btn btn-primary btn-icon-text">
          <i class="mdi mdi-plus-box btn-icon-prepend"></i> Mulai Menimbang </button></a>
        </p>
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
                @foreach ($penimbangan as $p)
                <tr data-aos="fade-up">
                    <td data-title="No"><?= $i++ ?></td>
                    <td data-title="Tanggal Pemeriksaan">{{ $p->tanggal }}</td>
                    <td data-title="Nama Balita">{{ $p->nama_balita }}</td>
                    <td data-title="Berat Badan">{{ $p->berat }}</td>
                    <td data-title="Umur">{{ $p->p_umur }}</td>
                    <td data-title="Jenis Kelamin">{{ $p->kelamin }}</td>
                    <td data-title="Status">{{ $p->status }}</td>
                    {{-- <td>
                        <form action="{{ route('penimbangan.destroy',$p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin?')">

                            <a class="btn btn-info" href="{{ route('penimbangan.show',$p->id) }}">Show</a>
                            <a class="btn btn-info" href="/penimbangan/{{$p->id}}">Show</a>
            
                            <a class="btn btn-primary" href="{{ route('penimbangan.edit',$p->id) }}">Edit</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
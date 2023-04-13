@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Karyawan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Karyawan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <a href="{{url('karyawan/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
    <form action="{{url('karyawan')}}" method="get">
        <div class="input-group mb-3 w-25">
            <input type="text" name="search" class="form-control" placeholder="Search"
                   value="{{request()->search}}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
      <table class="table table-bordered table-sttriped">
        <thead>
          <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>E-mail</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          @if($karyawan -> count() > 0)
            @foreach($karyawan as $i =>$p)
              <tr>
                <td>{{++$i}}</td>
                <td>{{$p->nip}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->ttl}}, {{$p->tanggalLahir}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->alamat}}</td>
                <td>
                  <a href="{{url('/karyawan/'. $p->id . '/edit')}}" class="btn btn-sm btn-warning">Edit</a>

                  <form method="POST" action="{{ url('/karyawan/' . $p->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-sm btn-danger">Hapus</button>
                  </form>

                </td>

              </tr>
            @endforeach

          @else
          <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>

          @endif

        </tbody>

      </table>
      {{ $karyawan->links() }}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      Footer Karyawan
    </div>
    <!-- /.card-footer-->
  </div>
@endsection
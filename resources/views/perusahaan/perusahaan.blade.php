@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Perusahaan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Perusahaan</li>
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
      <h3 class="card-title">Daftar Perusahaan</h3>

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
        <a href="{{url('perusahaan/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
        <form action="{{url('perusahaan')}}" method="get">
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
            <th>Nama</th>
            <th>Website</th>
            <th>E-mail</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

          @if($prsh -> count() > 0)
            @foreach($prsh as $i =>$p)
              <tr>
                <td>{{++$i}}</td>
                <td>{{$p->nama}}</td>
                <td>{{$p->website}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->alamat}}</td>
                <td>
                  <a href="{{url('/perusahaan/'. $p->id . '/edit')}}" class="btn btn-sm btn-warning">Edit</a>

                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$p->id}}"><i class="fas fa-trash pr-1"></i>Hapus</button>
                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$p->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel{{$p->id}}">Konfirmasi Hapus</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Anda yakin ingin menghapus {{$p->nama}} ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                          <form method="POST" action="{{ url('/perusahaan/'.$p->id)}}" class="d-inline pl-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Ya</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach

          @else
          <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>

          @endif

        </tbody>

      </table>
      {{ $prsh->links() }}

    </div>

    <div class="card-footer">
      Footer Perusahaan
    </div>

  </div>
@endsection
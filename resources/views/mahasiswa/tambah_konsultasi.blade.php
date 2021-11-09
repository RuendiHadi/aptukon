@extends('../layout_mahasiswa.mahasiswa')
@section('title-mhs')
Tambah Konsultasi
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
                    <!-- Page Heading -->
                     <div class="row">
                      <div class="col-lg-6">
                        <div class="card-body">
                           <h1 class="h3 mb-4 text-gray-800">Buat Konsultasi</h1>
                           @if (session('sukses-tambah'))
                            <div class="alert alert-success" role="alert">
                                <b>{{ session('sukses-tambah') }}</b> 
                            </div>
                          @endif
                          <form method="POST" action="/mahasiswa/pengajuan/konsultasi/tambah/aksi">
                            @csrf
                            <input type="hidden" name="email" value="{{$data->email}}" >
                            <div class="form-group">
                              <label>Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama_lengkap" value="{{$data->nama_lengkap}}" readonly>
                            </div>

                            <div class="form-group">
                              <label>Nim</label>
                              <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                            </div>

                            <div class="form-group">
                              <label>Judul Skripsi</label>
                              <textarea class="form-control" name="judul_skripsi"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                           </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
 @endsection
@extends('../layout_mahasiswa.mahasiswa')
@section('title-mhs')
Data Konsultasi
@endsection
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->

                    <h1 class="h3 mb-4 text-gray-800">Data Konsultasi</h1>
                     @if (session('sukses-tambah'))
                            <div class="alert alert-success" role="alert">
                                <b>{{ session('sukses-tambah') }}</b> 
                            </div>
                    @endif
                            <a href="/mahasiswa/pengajuan/konsultasi/tambah/{{Session::get('email')}}" class="btn btn-sm btn-primary mb-3">Tambah</a>
                            <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">ID  </th> -->
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Skripsi</th>
                                        <th scope="col">Aksi</th>
                                </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data_konsul as $dk)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$dk->judul}}</td>
                                        <td>
                                        <a href="/mahasiswa/pengajuan/konsultasi/ubah/{{$dk->id_konsul}}" class="btn btn-sm btn-success">Ubah</a>
                                        <a href="#" class="btn btn-sm btn-primary">Detail</a>
                                            
                                        </td>
                                      </tr>
                                    @endforeach
                            </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

@endsection
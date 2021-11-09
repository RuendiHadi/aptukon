@extends('../layout_mahasiswa.mahasiswa')
@section('title-mhs')
Update Profile Mahasiswa
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
                    <!-- Page Heading -->
                     <div class="row">
                      <div class="col-lg-6">
                        <div class="card-body">
                        <h1 class="h3 mb-4 text-gray-800">Update Mahasiswa</h1>
                           @if (session('sukses-tambah'))
                            <div class="alert alert-success" role="alert">
                                <b>{{ session('sukses-tambah') }}</b> 
                            </div>
                          @endif

                          @if (session('sukses-cek'))
                            <div class="alert alert-success" role="alert">
                                <b>{{ session('sukses-cek') }}</b> 
                            </div>
                          @endif

                           <form method="POST" action="/update/mhs/profile/aksi/{{Session::get('email')}}">
                            @csrf
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama_lengkap" value="{{Session::get('nama_lengkap')}}">
                            </div>
                            <div class="form-group">
                              <label>Nim</label>
                              <input type="text" class="form-control" name="nim_nik" value="{{Session::get('nim')}}">

                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="email" value="{{Session::get('email')}}" readonly>
                            </div>
                              <button type="submit" class="btn btn-primary">Update</button>
                           </form>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
@endsection
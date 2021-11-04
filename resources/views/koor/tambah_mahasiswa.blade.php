@extends('../layout_koor.koor')
@section('title-koor')
Tambah Mahasiswa
@endsection
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                     <div class="row">
                      <div class="col-lg-6">
                        <div class="card-body">
                           <h1 class="h3 mb-4 text-gray-800">Tambah Mahasiswa</h1>
                           @if (session('sukses-tambah'))
                            <div class="alert alert-success" role="alert">
                                <b>{{ session('sukses-tambah') }}</b> 
                            </div>
                          @endif
                           <form method="POST" action="/koor/tambah/mahasiswa/aksi">
                            @csrf
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" class="form-control" name="username" >
                            </div>
                            <div class="form-group">
                              <label>Nim</label>
                              <input type="text" class="form-control" name="nim" >
                            </div>
                            <div class="form-group">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama" >
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control" name="password" >
                            </div>
  
                              <button type="submit" class="btn btn-primary">Tambah</button>
                           </form>
                         
                           

                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

@endsection
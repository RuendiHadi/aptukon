@extends('../layout_koor.koor')
@section('title-koor')
Daftar Mahasiswa 
@endsection
@section('content')
<div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Daftar Mahasiswa</h1>
                    <table class="table table-striped table-hover">
                      <thead>
                                    <tr>
                                      <!-- <th scope="col">ID  </th> -->
                                      <th scope="col">No</th>
                                      <th scope="col">Nim</th>
                                      <th scope="col">Nama Lengkap</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    @foreach($daftar_mhs as $dm)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td>{{$dm->nim}}</td>
                                      <td>{{$dm->nama_lengkap}}</td>
                                    </tr>
                                    @endforeach  
                                  </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
@endsection
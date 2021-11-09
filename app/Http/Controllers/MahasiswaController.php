<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MahasiswaController extends Controller
{
    public function index(){
        return view('mahasiswa/index');
    }

    public function update_profile_aksi(Request $request,$id){
        $nama_lengkap = $request->input('nama_lengkap');
        $nim_nik = $request->input('nim_nik');
        $email = $request->input('email');
        $toMasterDataMahasiswa = array(
            'nama_lengkap' => $nama_lengkap,
            'nim' => $nim_nik
        );
        
        $cek_nim = DB::select("select nim from mahasiswa where email = '$email'"); // Untuk Validasi nim
        if ($cek_nim[0]->nim == $nim_nik){
            return redirect()->back()->with('sukses-cek','Nim Sudah Ada');
        }else{
            $insertMasterMahasiswa = DB::table('mahasiswa')->where('email',$id)->update($toMasterDataMahasiswa);
        if($insertMasterMahasiswa){
           return redirect()->back()->with('sukses-tambah','Berhasil Diubah');
        }else {
           echo'gagal';
        }

        }
        
    }

    public function update_profile(){
        return view('mahasiswa/update_profile');
    }

    public function data_konsultasi($id){
        $data_konsul = DB::table('master_konsultasi')->where('email',$id)->get();
        return view ('mahasiswa/data_konsultasi',compact('data_konsul'));
    }

    public function konsultasi_tambah($id){
        $data = DB::table('mahasiswa')->where('email',$id)->first(); //metode first memanggil 1 baris id yang dipanggil
        return view ('mahasiswa/tambah_konsultasi',compact('data'));  //compact mengirim data $data
    }

    public function konsultasi_tambah_aksi(Request $request){
        $email = $request->input('email');
        $judul_skripsi = $request->input('judul_skripsi');
        $toMasterKonsul = array(
            'email' =>$email,
            'judul' =>$judul_skripsi
        );
        $insert_toMasterKonsul = DB::table('master_konsultasi')->insert($toMasterKonsul);
        if($insert_toMasterKonsul){
            return redirect()->back()->with('sukses-tambah','Data Berhasil Ditambah');
        }else{
            echo 'Gagal';
        }
    }
    public function konsultasi_ubah($id){
        $data_ubah = DB::table('master_konsultasi')->where('id_konsul',$id)->first();
        $data = DB::table('mahasiswa')->where('email',$data_ubah->email)->first();
        return view ('mahasiswa/ubah_konsultasi',compact('data_ubah','data')); 

    }
    public function konsultasi_ubah_aksi(Request $request,$id){
        $judul_skripsi = $request->input('judul_skripsi');
        $ubahToMasterKonsul = DB::table('master_konsultasi')->where('id_konsul',$id)->update(['judul'=>$judul_skripsi]);
    if($ubahToMasterKonsul){
        return redirect()->back()->with('sukses-tambah','Data Berhasil Diubah');
    }else{
        echo 'Gagal';
    }
    }
    
}

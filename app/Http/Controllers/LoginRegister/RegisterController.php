<?php

namespace App\Http\Controllers\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RegisterController extends Controller
{
    public function index(){
        return view("register");
    }

    public function register(Request $request){
        $username=$request->input('username');
        $nim=$request->input('nim');
        $nama=$request->input('nama');
        $password=$request->input('password');
        $data=array(
            'id_role'=>1,
            'username'=>$username,
            'nama'=>$nama,
            'password'=>$password
        );
        $mahasiswa=array(
            'username'=>$username,
            'nim'=>$nim,
            'nama'=>$nama
        );
        $insert_user=DB::table('user')->insert($data);
        $insert_mahasiswa=DB::table('mahasiswa')->insert($mahasiswa);

        if($insert_user){
            return redirect('/register')->with('sukses-regis','Berhasil registrasi');
        }else{
            echo "gagal";
        }
    }
}

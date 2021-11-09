<?php

namespace App\Http\Controllers\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Socialite;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function callback(Request $request){
        $googleUser = Socialite::driver('google')->stateless()->user();
        if(empty($googleUser->user['hd'])){
            $nohd = "gmail.com";
        }else{
            $nohd = $googleUser->user['hd'];
        }

        $cekEmail = array(
            'email' => $googleUser->user['email']
        );

        $toUser = array(
            'email' => $googleUser->user['email'],
            'domain' => $nohd
        );
        $toMasterMahasiswa = array(
            'nama_lengkap' => $googleUser->user['name'],
            'nama_depan' => $googleUser->user['given_name'],
            'nama_belakang' => $googleUser->user['family_name'],
            'foto' => $googleUser->user['picture'],
            'email' => $googleUser->user['email']
        );
        $validasi = DB::TABLE('user')->where('email',$cekEmail['email'])->first();
        if(!$validasi){
            $inserToUser = DB::TABLE('user')->insert($toUser);
            $insertToMasterMahasiswa = DB::TABLE('mahasiswa')->insert($toMasterMahasiswa);

            $request->session()->put('nama_lengkap',$toMasterMahasiswa['nama_lengkap']);
            $request->session()->put('email',$toUser['email']);
            $request->session()->put('foto',$toMasterMahasiswa['foto']);
            if ($toUser['email']=="ruendihady102030@gmail.com"){ //Menjelaskan untuk login ke halaman dosen bari 53-64 karena tidak 
                return redirect('/dosen/home');                  // ada email student menggunkan if
            }
            else if($nohd=="gmail.com"){                         //menjelaskan untuk login ke halaman koordinator
                return redirect('/koor/home');
            }else if($nohd=="si.ukdw.ac.id"){                   //menjelaskan untuk login ke halaman mahasiswa
                return redirect('/mahasiswa/home');
            }else if($nohd=="students.ukdw.ac.id"){
                return redirect('/dosen/home');
            }else{
                echo "Tidak ada";
            }
        }else{
                $request->session()->put('nama_lengkap',$toMasterMahasiswa['nama_lengkap']);
                $request->session()->put('email',$toUser['email']);
                 $request->session()->put('foto',$toMasterMahasiswa['foto']);
                 if ($validasi->email=="ruendihady102030@gmail.com"){  //Menjelaskan untuk login ke halaman dosen bari 53-64
                    return redirect('/dosen/home');
                }
                else if($validasi->domain=="gmail.com"){               //menjelaskan untuk login ke halaman koordinator
                    return redirect('/koor/home');
                }else if($validasi->domain=="si.ukdw.ac.id"){          //menjelaskan untuk login ke halaman mahasiswa
                    return redirect('/mahasiswa/home');
                 }else if($validasi->domain=="students.ukdw.ac.id"){
                    return redirect('/dosen/home');
                }else{
                    echo "Tidak ada";
                }
            }
        
    }

    public function login(Request $request){    //Role Login
        $validasi=DB::table('user')->where('username',$request->input('username'))->first();  
        if($validasi){
            if($request->input('password')==$validasi->password){
                $request->session()->put('username',$request->input('username'));
                $request->session()->put('nama',$validasi->nama);
                if($validasi->id_role=='3'){
                    return redirect('/koor/home');
                }else if($validasi->id_role=='1'){
                    return redirect('/mahasiswa/home');
                }else if($validasi->id_role=='2'){
                    return redirect('/dosen/home');
                }
            }else{
                return redirect('/')->with('salah-password','Password Salah');
            }
        }else{
            return redirect('/')->with('salah-username','Username Belum Terdaftar');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/')->with('logout','Kamu Sudah Logout');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class KoorController extends Controller
{
    public function index(){
        return view('koor/index');
    }

    public function daftar_mhs(){
        $daftar_mhs=DB::table('mahasiswa')->get();
        return view ('koor/daftar_mhs',compact('daftar_mhs'));
    }
}

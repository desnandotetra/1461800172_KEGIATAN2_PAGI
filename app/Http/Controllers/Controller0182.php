<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class Controller0182 extends Controller

{
    public function buku(){
        $buku = DB::table('ms_buku')->get();
        $kategori = DB::table('ms_kategori')->select('nama_kategori','kode_kategori')->get();
        // dump($buku);
        return view('buku0182',['buku' => $buku,'kategori' => $kategori]);
    }

    public function kategori(Request $request){
        $data = $request->kategori;
        $kategori = DB::table('ms_kategori')->select('nama_kategori','kode_kategori')->get();
        $buku = DB::table('ms_buku')->where('kode_kategori','=',$data)->get();
        // dump($buku);
        return view('buku0182',['buku' => $buku,'kategori' => $kategori]);
    }

    public function peminjam(){
        $peminjam = DB::table('ms_peminjam')->get();
        return view('peminjam0182',['peminjam' => $peminjam]);
    }

    public function laporan(){
        $laporan = DB::table('ms_peminjaman')
        ->join('ms_detail_pinjam','ms_peminjaman.kode_peminjaman','=','ms_detail_pinjam.kode_peminjaman')
        ->join('ms_petugas','ms_peminjaman.kode_petugas','=','ms_petugas.kode_petugas')->get();
        // dump ($laporan);
        return view('laporan0182',['laporan' => $laporan]);
    }
    
    public function denda(){
        $laporan = DB::table('ms_peminjaman')
        ->join('ms_detail_pinjam','ms_peminjaman.kode_peminjaman','=','ms_detail_pinjam.kode_peminjaman')
        ->join('ms_petugas','ms_peminjaman.kode_petugas','=','ms_petugas.kode_petugas')
        ->where('denda','>',0)->get();
        // dump($buku);
        return view('laporan0182',['laporan' => $laporan]);
    }

    public function petugas(){
        $petugas = DB::table('ms_petugas')->get();
        return view('petugas0182',['petugas' => $petugas]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamRuang;
use App\Models\PengelolaanRuang;

class UserPinjamController extends Controller
{
    public function index()
    {
        $data = PengelolaanRuang::all();
        return view('user.user_pinjam', compact('data'));
    }
    
    public function ajukanPeminjaman(Request $request)
    {
        $permintaan = new PinjamRuang;
        $permintaan->nama_peminjam = $request->nama_peminjam;
        $permintaan->tanggal_pinjam = $request->tanggal_pinjam;
        $permintaan->waktu_pinjam = $request->waktu_pinjam;
        $permintaan->waktu_kembali = $request->waktu_kembali;
        $permintaan->ruang = $request->ruang;
        $permintaan->alasan = $request->alasan;
        $permintaan->save();
        return redirect()->back()->with('success', 'Permintaan peminjaman ruangan berhasil diajukan.');
    }
    
}
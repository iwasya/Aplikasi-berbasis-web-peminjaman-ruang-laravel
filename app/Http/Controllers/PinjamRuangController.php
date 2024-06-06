<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamRuang;
use Maatwebsite\Excel\Facades\Excel;


class PinjamRuangController extends Controller
{
    public function index()
    {
        $data=PinjamRuang::all();
        return view("pinjamruang",compact("data"));
    }
    
    public function simpan(Request $request)
    {
        $data=new pinjamruang();
            $data->no =$request->no ;
            $data->nama_peminjam=$request->nama_peminjam;
            $data->tanggal_pinjam=$request->tanggal_pinjam;
            $data->waktu_pinjam=$request->waktu_pinjam;
            $data->waktu_kembali=$request->waktu_kembali;
            $data->ruang=$request->ruang;
            $data->alasan=$request->alasan;
        $data->save();
        return back();
    }

// In your PinjamRuangController.php

public function edit($no)
{
    $pinjamruang = PinjamRuang::findOrFail($no);
    return view('pinjamruang.edit', compact('pinjamruang'));
}

public function update(Request $request, string $no)
{
    $pinjamruang = PinjamRuang::where('no', $no);
    $pinjamruang->update([
        'nama_peminjam' => $request->nama_peminjam,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'waktu_pinjam' => $request->waktu_pinjam,
        'waktu_kembali' => $request->waktu_kembali,
        'ruang' => $request->ruang,
        'alasan' => $request->alasan
    ]);

    return redirect()->back()->with('success', 'Data updated successfully');
}

public function destroy($no)
{
    $data = PinjamRuang::where('no', $no);
    $data->delete();

    return redirect()->back()->with('success', 'Data deleted successfully');
}


    public function daftarPermintaan()
    {
        $permintaan = PinjamRuangController::all();
        return response()->json($permintaan);
    }

    public function persetujuan(Request $request, $no)
    {
        $permintaan = pinjamruang::findOrFail($no);
        if (!$permintaan) {
            return response()->json(['error' => 'Permintaan peminjaman tidak ditemukan.'], 404);
        }
        $permintaan->status = $request->status;
        $permintaan->save();
    
        return redirect()->back()->with('success', 'Permintaan peminjaman berhasil diperbarui.');
    }
    
    public function exportExcel()
    {
        return Excel::download(new PinjamRuang, 'pinjamruang.xlsx');
    }


}
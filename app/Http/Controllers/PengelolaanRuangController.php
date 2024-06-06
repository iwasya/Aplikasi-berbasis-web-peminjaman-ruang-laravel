<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengelolaanRuang;
use Illuminate\Support\Facades\Storage;
use PDF;

class PengelolaanRuangController extends Controller
{
    public function index()
    {
        $data = PengelolaanRuang::all();
        return view("pengelolaanruang", compact("data"));
    }

    public function simpan(Request $request)
    {
        $data = new PengelolaanRuang();
        $data->ruangan = $request->ruangan;
        $data->descripsi = $request->descripsi;
        $data->kapasitas = $request->kapasitas;

        // Upload dan simpan file foto ruangan
        if ($request->hasFile('foto_ruangan')) {
            $file = $request->file('foto_ruangan');
            $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
            $path = $file->storeAs('public/foto_ruangan', $fileName); // Menyimpan file ke storage

            // Simpan nama file ke dalam database
            $data->foto_ruangan = $fileName;
        }

        $data->save();
        return back()->with('success', 'Data berhasil disimpan.');
    }
    
    public function destroy($no)
    {
        $data = PengelolaanRuang::where('no', $no);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
    public function generatePDF()
    {
        // Mengambil semua data dari model PinjamRuang
        $data = PengelolaanRuang::all([
            'no', 
            'ruangan', 
            'descripsi', 
            'kapasitas', 
            'foto_ruangan']);
    
        // Memuat view Blade dan memasukkan data
        if ($data->isNotEmpty()) {
            $pdf = PDF::loadView('pdf.detail1', ['data' => $data]);
            return $pdf->download('Data_PengelolaanRuang.pdf');
        } else {
            return "Tidak ada data yang tersedia untuk dibuat PDF.";
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\PinjamRuang;
use Illuminate\Http\Request;


use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Mengambil semua data dari model PinjamRuang
        $data = PinjamRuang::all([
            'no', 
            'nama_peminjam', 
            'tanggal_pinjam', 
            'waktu_pinjam', 
            'waktu_kembali', 
            'ruang', 
            'alasan',
            'status']);
    
        // Memuat view Blade dan memasukkan data
        if ($data->isNotEmpty()) {
            $pdf = PDF::loadView('detail', ['data' => $data]);
            return $pdf->download('Data_PeminjamanRuang.pdf');
        } else {
            return "Tidak ada data yang tersedia untuk dibuat PDF.";
        }
    }
    

}
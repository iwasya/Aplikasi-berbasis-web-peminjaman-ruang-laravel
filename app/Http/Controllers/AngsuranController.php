<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;

class AngsuranController extends Controller
{
    public function index()
    {
        $data = Angsuran::all(); // Perbaikan 2: Sesuaikan nama model
        return view("angsuran", compact("data")); // Perbaikan 3: Sesuaikan nama view
    }
    public function simpan(Request $request)
    {
        $data = new Angsuran();
        $data->no = $request->no;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->kelas = $request->kelas;
        $data->jan = $request->jan;
        $data->feb = $request->feb;
        $data->mar = $request->mar;
        $data->apr = $request->apr;
        $data->mei = $request->mei;
        $data->juni = $request->juni;
        
        // Menghitung total dari Januari hingga Juni
        $total = $request->jan + $request->feb + $request->mar + $request->apr + $request->mei + $request->juni;
        $data->total = $total;
    
        $data->save();
        return back();
    }
    
    public function destroy($no)
{
    $data = Angsuran::where('no', $no);
    $data->delete();

    return redirect()->back()->with('success', 'Data deleted successfully');
}
}
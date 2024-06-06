<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengelolauser;
use PDF;

class PengelolaUserController extends Controller
{
    public function index()
    {
        $data = Pengelolauser::all();
        return view("user", compact("data"));
    }

    public function simpan(Request $request)
    {
        $data = new Pengelolauser();
        $data->id = $request->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->role = $request->role;
        $data->save();
        return back();
    }

    public function edit($id)
    {
        $user = Pengelolauser::findOrFail($id); // Perbaikan: Gunakan variabel $user
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $pinjamruang = Pengelolauser::findOrFail($id);

        // Periksa apakah ada perubahan pada password
        if ($request->filled('password')) {
            $pinjamruang->password = bcrypt($request->password);
        }

        // Kemudian, perbarui atribut lainnya
        $pinjamruang->name = $request->name;
        $pinjamruang->email = $request->email;
        $pinjamruang->role = $request->role;
        $pinjamruang->save();

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function destroy($id)
    {
        $data = Pengelolauser::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data deleted successfully');
    }
    public function generatePDF()
    {
        // Mengambil semua data dari model PinjamRuang
        $data = Pengelolauser::all([
            'id', 
            'name', 
            'email', 
            'password', 
            'role']);
    
        // Memuat view Blade dan memasukkan data
        if ($data->isNotEmpty()) {
            $pdf = PDF::loadView('pdf.detail2', ['data' => $data]);
            return $pdf->download('Data_User.pdf');
        } else {
            return "Tidak ada data yang tersedia untuk dibuat PDF.";
        }
    }
}
<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'no' => $row[0], // Index 0 untuk kolom 'no'
            'nama_peminjam' => $row[1], // Index 1 untuk kolom 'nama_peminjam'
            'tanggal_pinjam' => $row[2], // Index 2 untuk kolom 'tanggal_pinjam'
            'waktu_pinjam' => $row[3], // Index 3 untuk kolom 'waktu_pinjam'
            'waktu_kembali' => $row[4], // Index 4 untuk kolom 'waktu_kembali'
            'ruang' => $row[5], // Index 5 untuk kolom 'ruang'
            'status' => $row[6], // Index 6 untuk kolom 'status'
        ]);
    }
}
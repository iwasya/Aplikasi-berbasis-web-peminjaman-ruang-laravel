<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamRuang extends Model
{
    use HasFactory;
    protected $table = 'pinjamruang';
    protected $primaryKey = 'no';
    protected $fillable = [
        'no',
        'nama_peminjam',
        'tanggal_pinjam',
        'waktu_pinjam',
        'waktu_kembali',
        'ruang',
        'alasan',
    ];
    
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengelolaanRuang extends Model
{
    use HasFactory;
    protected $table = 'pengelolaan_ruang';
    protected $fillable = [
        'no',
        'ruangan',
        'descripsi',
        'kapasitas',
        'foto_ruangan',
    ];
}
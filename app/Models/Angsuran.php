<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    protected $table = 'angsuran';
    protected $fillable = [
        'no',
        'nis',
        'nama',
        'kelas',
        'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'total',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = "paket";
    protected $fillable = ['jenis_paket', 'deskripsi', 'harga', 'pertemuan_belajar', 'id_kelas'];
}
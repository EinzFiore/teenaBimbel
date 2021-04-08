<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;
    protected $table = 'data_registrasi';
    protected $fillable = ['id_user', 'id_jenjang', 'asal_sekolah', 'id_kelas', 'id_paket'];
}
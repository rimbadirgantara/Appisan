<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prekalkulasi extends Model
{
    use HasFactory;
    protected $table = 'tbl_prekalkulasi';
    protected $primaryKey = 'id_prekalkulasi';

    protected $fillable = [
       'id_user', 'id_siswa', 'penghasilan_orang_tua', 'akreditas', 'beasiswa', 'ormas', 'nilai_semester_5', 'prestasi', 'fasilitas', 'dosen'
    ];
}

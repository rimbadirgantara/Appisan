<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKalkulasi extends Model
{
    use HasFactory;
    protected $table = 'tbl_hasil_kalkulasi';
    protected $primaryKey = 'id_kalkulasi';

    protected $fillable = [
        'id_user', 'id_siswa', 'nama_jurusan', 'nilai'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nama_siswa', 'id_sekolah', 'kelas', 'jenis_kelamin'
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SiswaController extends Controller
{
    public function index(Request $request) {
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'Dashboard User',
            'segmentUrl' => $request->segments()[1],

            'totalSiswa' => User::where('level', 'siswa')->count(),
            'siswaLaki' => User::where('jenis_kelamin', 'Laki-laki')->where('level', 'siswa')->count(),
            'siswaPerempuan' => User::where('jenis_kelamin', 'Perempuan')->where('level', 'siswa')->count()
        ];
        return view('userPages.playPages.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        $data = [
            'title' => '.: LOGIN :.',
            'appName' => 'PinPilJur',
            'desk' => '"Pintar Pilih Jurusan" adalah web aplikasi berbasis sistem pendukung keputusan untuk membantu calon mahasiswa menemukan jurusan yang sesuai. Dengan analisis data, aplikasi ini memberikan rekomendasi akurat, memudahkan pengguna dalam mengambil keputusan cerdas tentang pilihan pendidikan tinggi mereka.'
        ];
        return view('authPages.login', $data);
    }
}

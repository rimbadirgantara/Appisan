<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function doLogin(Request $request) {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:8'
        ]);
        // greatAdmin::#Pinpinjur01(web)
        if (Auth::Attempt($request->only('username', 'password'))){
            $user = Auth::user();
            if ($user->level === 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/login');
            }
        }
        return back()->with('failed', 'Maaf, Terjadi Kesalahan !');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}

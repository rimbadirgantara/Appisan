<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Sekolah;

class LoginController extends Controller
{
    public function index() {
        $data = [
            'title' => '.: LOGIN :.',
            'appName' => 'PinPilJur',
            'desk' => '"Pintar Pilih Jurusan" adalah web aplikasi berbasis sistem pendukung keputusan untuk membantu calon mahasiswa menemukan jurusan yang sesuai. Dengan analisis data, aplikasi ini memberikan rekomendasi akurat, memudahkan pengguna dalam mengambil keputusan cerdas tentang pilihan pendidikan tinggi mereka.'
        ];
        // dd(Hash::make('12345678'));
        return view('authPages.login', $data);
    }

    public function doLogin(Request $request) {
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:3'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
            // dd($user->level);
            if ($user->level == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->level == 'guru') {
                $request->session()->regenerate();
                return redirect()->intended('/guru/dashboard');
            } else {
                return back()->with('failed', 'Maaf, Terjadi Kesalahan !');
            }
        }
        return back()->with('failed', 'Maaf, Terjadi Kesalahan !');
    }

    public function register() {
        $data = [
            'title' => '.: Register :.',
            'appName' => 'PinPilJur',
            'desk' => '"Pintar Pilih Jurusan" adalah web aplikasi berbasis sistem pendukung keputusan untuk membantu calon mahasiswa menemukan jurusan yang sesuai. Dengan analisis data, aplikasi ini memberikan rekomendasi akurat, memudahkan pengguna dalam mengambil keputusan cerdas tentang pilihan pendidikan tinggi mereka.',
            'listSekolah' => Sekolah::all()
        ];
        return view('authPages.register', $data);
    }

    public function doRegis(Request $request) {
        $request->validate([
            'username' => 'required|min:5|unique:tbl_users,username',
            'email' => 'required|min:5|unique:tbl_users,email|email:rcf,dns',
            'password' => 'required|min:8',
            'jenis_kelamin' => 'required|min:5',
            'nama_sekolah' => 'required|numeric',
            'kelas' => 'required|numeric'
        ]);
        
        $user = new User;
        $user->username = preg_replace("/\s+/", "", strtolower($request->username));
        $user->email = $request->email;
        $user->level = 'guru';
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->profile_pict = 'avatar.png';
        $user->password = Hash::make($request->password);
        $user->id_sekolah = $request->nama_sekolah;
        $user->kelas = $request->kelas;

        if ($user->save()) {
            return back()->with('success', 'Username anda ' . preg_replace("/\s+/", "", strtolower($request->username)) . ' Silahkan Login !');
        } else {
            return back()->with('failed', 'Akun anda Gagal dibuat !');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}

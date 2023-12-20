<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\HasilKalkulasi;

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

    public function profile(Request $request){
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'User Profile',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => User::select('*')
                                        ->join('tbl_sekolah', 'tbl_users.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                                        ->where('tbl_users.id_user', Auth::user()->id_user)
                                        ->get()->first()
        ];
        return view('userPages.playPages.profile', $data);
    }

    public function updateProfile(Request $request, $idUser) {
        $user = User::find($idUser);
        if ($request->username == $user->username) {
            $usernameRules = 'required|min:5';
        } else {
            $usernameRules = 'required|unique:tbl_users,username';
        }

        if ($request->email == $user->email) {
            $emailRules = 'required|min:8|email:rcf,dns';
        } else {
            $emailRules = 'required|min:8|unique:tbl_users,email|email:rcf,dns';
        }

        if ($request->hasFile('profile')) {
            $fileRules = 'required|image|max:5120';
        } else {
            $fileRules = '';
        }

        if ($request->password) {
            $password = Hash::make($request->password);
            $pwRules = 'required|min:8';
        } else {
            $password = Hash::make($request->password);
            $pwRules = '';
        }
        $request->validate([
            'username' => $usernameRules,
            'email' => $emailRules,
            'profile' => $fileRules,
            'password' => $pwRules
        ]);

        $user->username = $user->username = preg_replace("/\s+/", "", strtolower($request->username));
        $user->email = $request->email;
        $user->password = $password;
        $file = $request->file('profile');
        if ($request->hasFile('profile')) {
            if (file_exists('adminTemplate/assets/img/profileImage/'.$user->profile_pict)) {
                if ($user->profile_pict == 'avatar.png') {
                    // tidak lakukan apa apa !
                } else {
                    unlink('adminTemplate/assets/img/profileImage/'.$user->profile_pict);
                }
            }
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('adminTemplate/assets/img/profileImage/', $fileName);
            $user->profile_pict = $fileName;
        }

        if ($user->save()) {
            alert()->success('Hore!','Kamu berhasil update data !');
            return back();
        } else {
            alert()->error('waduhh !','Kamu gagal update data :(');
            return back();
        }
    }
    
    public function halamanKeputusan(Request $request){
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'Keputusan',
            'segmentUrl' => $request->segments()[1],
        ];
        return view('userPages.playPages.keputusan', $data);
    }

    public function doKeputusan(Request $request) {
        $request->validate([
            // validasi TI
            'biaya_TI' => 'numeric|max_digits:5',
            'penghasilan_orang_tua_TI' => 'numeric|max_digits:5',
            'beasiswa_TI' => 'numeric|max_digits:5',
            'ormas_TI' => 'numeric|max_digits:5',
            'akreditasi_TI' => 'numeric|max_digits:5',

            // validasi mesin
            'biaya_MESIN' => 'numeric|max_digits:5',
            'penghasilan_orang_tua_MESIN' => 'numeric|max_digits:5',
            'beasiswa_MESIN' => 'numeric|max_digits:5',
            'ormas_MESIN' => 'numeric|max_digits:5',
            'akreditasi_MESIN' => 'numeric|max_digits:5',

            // validasi ADM
            'biaya_ADM' => 'numeric|max_digits:5',
            'penghasilan_orang_tua_ADM' => 'numeric|max_digits:5',
            'beasiswa_ADM' => 'numeric|max_digits:5',
            'ormas_ADM' => 'numeric|max_digits:5',
            'akreditasi_ADM' => 'numeric|max_digits:5',
        ]);

        $bobot = [
            'biaya' => 0.2, 'penghasilan_ortu' => 0.15,
            'beasiswa' => 0.15, 'ormas' => 0.25, 'akreditasi' => 0.25
        ];

        $dataTI = [
            'biaya_TI' => $request->biaya_TI, 'penghasilan_ortu_TI' => $request->penghasilan_orang_tua_TI,
            'beasiswa_TI' => $request->beasiswa_TI,
            'ormas_TI' => $request->ormas_TI,
            'akreditasi_TI' => $request->akreditasi_TI,
        ];

        $dataMESIN = [
            'biaya_MESIN' => $request->biaya_MESIN, 'penghasilan_orang_tua_MESIN' => $request->penghasilan_orang_tua_MESIN,
            'beasiswa_MESIN' => $request->beasiswa_MESIN,
            'ormas_MESIN' => $request->ormas_MESIN,
            'akreditasi_MESIN' => $request->akreditasi_MESIN,
        ];

        $dataADM = [
            'biaya_ADM' => $request->biaya_ADM, 'penghasilan_orang_tua_ADM' => $request->penghasilan_orang_tua_ADM,
            'beasiswa_ADM' => $request->beasiswa_ADM,
            'ormas_ADM' => $request->ormas_ADM,
            'akreditasi_ADM' => $request->akreditasi_ADM,
        ];

        // normalisasi
        $normalisasi_dataTI = [
            'biaya_TI' => $dataTI['biaya_TI'] * $bobot['biaya'],
            'penghasilan_ortu_TI' => $dataTI['penghasilan_ortu_TI'] * $bobot['penghasilan_ortu'],
            'beasiswa_TI' => $dataTI['beasiswa_TI'] * $bobot['beasiswa'],
            'ormas_TI' => $dataTI['ormas_TI'] * $bobot['ormas'],
            'akreditasi_TI' => $dataTI['akreditasi_TI'] * $bobot['akreditasi'],
        ];

        $normalisasi_dataMESIN = [
            'biaya_MESIN' => $dataMESIN['biaya_MESIN'] * $bobot['biaya'],
            'penghasilan_orang_tua_MESIN' => $dataMESIN['penghasilan_orang_tua_MESIN'] * $bobot['penghasilan_ortu'],
            'beasiswa_MESIN' => $dataMESIN['beasiswa_MESIN'] * $bobot['beasiswa'],
            'ormas_MESIN' => $dataMESIN['ormas_MESIN'] * $bobot['ormas'],
            'akreditasi_MESIN' => $dataMESIN['akreditasi_MESIN'] * $bobot['akreditasi'],
        ];

        $normalisasi_dataADM = [
            'biaya_ADM' => $dataADM['biaya_ADM'] * $bobot['biaya'],
            'penghasilan_orang_tua_ADM' => $dataADM['penghasilan_orang_tua_ADM'] * $bobot['penghasilan_ortu'],
            'beasiswa_ADM' => $dataADM['beasiswa_ADM'] * $bobot['beasiswa'],
            'ormas_ADM' => $dataADM['ormas_ADM'] * $bobot['ormas'],
            'akreditasi_ADM' => $dataADM['akreditasi_ADM'] * $bobot['akreditasi'],
        ];

        // jarak euclidien
        $TI = sqrt(pow($normalisasi_dataTI['biaya_TI'] - 0.4,2) + pow($normalisasi_dataTI['penghasilan_ortu_TI'] - 0.6,2) + pow($normalisasi_dataTI['beasiswa_TI'] - 0.6,2) + pow($normalisasi_dataTI['ormas_TI'] - 1.0,2) + pow($normalisasi_dataTI['akreditasi_TI'] - 1.0,2));
        $ADM = sqrt(pow($normalisasi_dataMESIN['biaya_MESIN'] - 0.4,2) + pow($normalisasi_dataMESIN['penghasilan_orang_tua_MESIN'] - 0.6,2) + pow($normalisasi_dataMESIN['beasiswa_MESIN'] - 0.6,2) + pow($normalisasi_dataMESIN['ormas_MESIN'] - 1.0,2) + pow($normalisasi_dataMESIN['akreditasi_MESIN'] - 1.0,2));
        $MESIN = sqrt(pow($normalisasi_dataADM['biaya_ADM'] - 0.4,2) + pow($normalisasi_dataADM['penghasilan_orang_tua_ADM'] - 0.6,2) + pow($normalisasi_dataADM['beasiswa_ADM'] - 0.6,2) + pow($normalisasi_dataADM['ormas_ADM'] - 1.0,2) + pow($normalisasi_dataADM['akreditasi_ADM'] - 1.0,2));

        // perhitungan skor relative proximity
        $skor_TI = $TI / ($TI + $ADM + $MESIN);
        $skor_ADM = $ADM / ($TI + $ADM + $MESIN);
        $skor_MESIN = $MESIN / ($TI + $ADM + $MESIN);

        $simpanKalkulasi = new HasilKalkulasi;
        $simpanKalkulasi->id_user = Auth::user()->id_user;
        $simpanKalkulasi->teknik_informatika = $skor_TI;
        $simpanKalkulasi->teknik_mesin = $skor_MESIN;
        $simpanKalkulasi->adm = $skor_ADM;

        if ($simpanKalkulasi->save()) {
            alert()->success('Hore!','Kalkulasi Berhasil !');
            return back();
        } else {
            alert()->success('Waduhh !','Gagal Menyimpan Data !');
            return back();
        }
    }

    public function hasilKeputusan(Request $request) {
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'Hasil Keputusan',
            'segmentUrl' => $request->segments()[1],
            'dataHasil' => HasilKalkulasi::select('*')
                                    ->join('tbl_users', 'tbl_hasil_kalkulasi.id_user', '=', 'tbl_users.id_user')
                                    ->where('tbl_hasil_kalkulasi.id_user', Auth::user()->id_user)->paginate(100)
        ];
        return view('userPages.playPages.hasilKeputusan', $data);
    }

    public function hapusKalkulasi($id){
        $a = HasilKalkulasi::find($id);
        if ($a->delete()) {
            alert()->success('Hore!','Data berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !','Data gagal di hapus !');
            return back();
        }
    }
}

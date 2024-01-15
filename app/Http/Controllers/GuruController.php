<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Sekolah;
use App\Models\Prekalkulasi;
use App\Models\Siswa;
use App\Models\HasilKalkulasi;
use DB;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'Appisan',
            'title' => 'Dashboard Guru',
            'segmentUrl' => $request->segments()[1],

            'totalSiswa' => Siswa::where('id_sekolah', Auth::user()->id_sekolah)->count(),
            'siswaLaki' => Siswa::where('jenis_kelamin', 'Laki-laki')->where('id_sekolah', Auth::user()->id_sekolah)->count(),
            'siswaPerempuan' => Siswa::where('jenis_kelamin', 'Perempuan')->where('id_sekolah', Auth::user()->id_sekolah)->count(),

            'dataSiswa' => Siswa::select('tbl_siswa.*', 'tbl_sekolah.*')
                ->join('tbl_sekolah', 'tbl_siswa.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                ->where('tbl_siswa.id_sekolah', Auth::user()->id_sekolah)
                ->paginate(100),
        ];
        return view('userPages.playPages.index', $data);
    }

    public function hapusSiswa($id)
    {
        $a = Siswa::find($id);
        if ($a->delete()) {
            alert()->success('Hore!', 'Siswa berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !', 'Siswa gagal di hapus !');
            return back();
        }
    }

    public function profile(Request $request)
    {
        $data = [
            'appName' => 'Appisan',
            'title' => 'User Profile',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => User::select('*')
                ->join('tbl_sekolah', 'tbl_users.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                ->where('tbl_users.id_user', Auth::user()->id_user)
                ->get()->first()
        ];
        return view('userPages.playPages.profile', $data);
    }

    public function updateProfile(Request $request, $idUser)
    {
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
            $password = $user->password;
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
            if (file_exists('adminTemplate/assets/img/profileImage/' . $user->profile_pict)) {
                if ($user->profile_pict == 'avatar.png') {
                    // tidak lakukan apa apa !
                } else {
                    unlink('adminTemplate/assets/img/profileImage/' . $user->profile_pict);
                }
            }
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('adminTemplate/assets/img/profileImage/', $fileName);
            $user->profile_pict = $fileName;
        }

        if ($user->save()) {
            alert()->success('Hore!', 'Kamu berhasil update data !');
            return back();
        } else {
            alert()->error('waduhh !', 'Kamu gagal update data :(');
            return back();
        }
    }

    public function halamanKeputusan(Request $request)
    {
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'Appisan',
            'title' => 'Keputusan',
            'segmentUrl' => $request->segments()[1],

            'dataSiswa' => Siswa::where('id_sekolah', Auth::user()->id_sekolah)->get(),
            'dataPrekalkulasi' => Prekalkulasi::select("*")
                ->join('tbl_siswa', 'tbl_prekalkulasi.id_siswa', '=', 'tbl_siswa.id_siswa')
                ->where('id_user', Auth::user()->id_user)->get()
        ];

        return view('userPages.playPages.keputusan', $data);
    }

    public function prekalkulasi(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|numeric',
            'penghasilan_orang_tua' => 'required|numeric',
            'akreditas' => 'required|numeric',
            'beasiswa' => 'required|numeric',
            'ormas' => 'required|numeric',
            'nilai_semester' => 'required|numeric',
            'prestasi' => 'required|numeric',
            'fasilitas' => 'required|numeric',
            'dosen' => 'required|numeric',
        ]);

        $user = new Prekalkulasi;
        $user->id_siswa = $request->nama_siswa;
        $user->id_user = Auth::user()->id_user;
        $user->penghasilan_orang_tua = $request->penghasilan_orang_tua;
        $user->akreditas = $request->akreditas;
        $user->beasiswa = $request->beasiswa;
        $user->ormas = $request->ormas;
        $user->nilai_semester_5 = $request->nilai_semester;
        $user->prestasi = $request->prestasi;
        $user->fasilitas = $request->fasilitas;
        $user->dosen = $request->dosen;

        if ($user->save()) {
            alert()->success('Hore!', 'Pilihan Siswa berhasil di buat !');
            return back();
        } else {
            alert()->success('Waduhh !', 'Pilihan Siswa gagal di buat !');
            return back();
        }
    }

    public function hapusPrekalkulasi($id)
    {
        $a = Prekalkulasi::find($id);
        if ($a->delete()) {
            alert()->success('Hore!', 'Siswa berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !', 'Siswa gagal di hapus !');
            return back();
        }
    }

    public function doKeputusan(Request $request)
    {
        $hasil_kalkulasi = [];

        // penghasilan orang tua
        $penghasilanOrangTua = Prekalkulasi::select('penghasilan_orang_tua')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxPenghasilanOrangTua = max($penghasilanOrangTua);
        $portu = [];
        for ($i = 0; $i < count($penghasilanOrangTua); $i++) {
            // Perform the calculation and append the result to the array
            $portu[] = $penghasilanOrangTua[$i]['penghasilan_orang_tua'] / $maxPenghasilanOrangTua['penghasilan_orang_tua'];
        }
        $hasil_kalkulasi[] = $portu;

        //akreditas
        $akreditas = Prekalkulasi::select('akreditas')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxAkreditas = max($akreditas);
        $akre = [];
        for ($i = 0; $i < count($akreditas); $i++) {
            $akre[] = $akreditas[$i]['akreditas'] / $maxAkreditas['akreditas'];
        }
        $hasil_kalkulasi[] = $akre;


        // beasiswa
        $beasiswa = Prekalkulasi::select('beasiswa')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxBeasiswa = max($beasiswa);
        $bea = [];
        for ($i = 0; $i < count($beasiswa); $i++) {
            $bea[] = $beasiswa[$i]['beasiswa'] / $maxBeasiswa['beasiswa'];
        }
        $hasil_kalkulasi[] = $bea;

        // ormas
        $ormas = Prekalkulasi::select('ormas')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxOrmas = max($ormas);
        $or = [];
        for ($i = 0; $i < count($ormas); $i++) {
            $or[] = $ormas[$i]['ormas'] / $maxOrmas['ormas'];
        }
        $hasil_kalkulasi[] = $or;

        // nilai semester
        $nilaiSemester = Prekalkulasi::select('nilai_semester_5')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxNilaiSemester = max($nilaiSemester);
        $nilai = [];
        for ($i = 0; $i < count($nilaiSemester); $i++) {
            $nilai[] = $nilaiSemester[$i]['nilai_semester_5'] / $maxNilaiSemester['nilai_semester_5'];
        }
        $hasil_kalkulasi[] = $nilai;

        // pretasi
        $prestasi = Prekalkulasi::select('prestasi')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxPrestasi = max($prestasi);
        $pres = [];
        for ($i = 0; $i < count($prestasi); $i++) {
            $pres[] = $prestasi[$i]['prestasi'] / $maxPrestasi['prestasi'];
        }
        $hasil_kalkulasi[] = $pres;

        // fasilitas
        $fasilitas = Prekalkulasi::select('fasilitas')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxFasilitas = max($fasilitas);
        $fasi = [];
        for ($i = 0; $i < count($fasilitas); $i++) {
            $fasi[] = $fasilitas[$i]['fasilitas'] / $maxFasilitas['fasilitas'];
        }
        $hasil_kalkulasi[] = $fasi;

        // dosen
        $dosen = Prekalkulasi::select('dosen')
            ->where('id_user', Auth::user()->id_user)
            ->get()->toArray();

        $maxDosen = max($dosen);
        $dos = [];
        for ($i = 0; $i < count($dosen); $i++) {
            $dos[] = $dosen[$i]['dosen'] / $maxDosen['dosen'];
        }
        $hasil_kalkulasi[] = $dos;

        $jumlah_kolom = count($hasil_kalkulasi[0]); // Jumlah kolom dalam matriks
        $jumlah_baris = count($hasil_kalkulasi);    // Jumlah baris dalam matriks

        // Inisialisasi array untuk menyimpan hasil penjumlahan setiap kolom
        $hasil_penjumlahan_kolom = array_fill(0, $jumlah_kolom, 0);

        // Perulangan untuk menjumlahkan kolom-kolom setelah dikalikan dengan 20% pada putaran pertama dan kelima
        for ($i = 0; $i < $jumlah_baris; $i++) {
            for ($j = 0; $j < $jumlah_kolom; $j++) {
                $faktor_pengali = ($i == 0 || $i == 4) ? 0.2 : 0.1; // 20% untuk putaran pertama dan kelima, 10% untuk putaran lainnya
                $hasil_kalkulasi[$i][$j] *= $faktor_pengali; // Kalikan dengan faktor pengali
                $hasil_penjumlahan_kolom[$j] += $hasil_kalkulasi[$i][$j];
            }
        }

        $dataSiswa = Prekalkulasi::select("tbl_siswa.id_siswa")
            ->join('tbl_siswa', 'tbl_prekalkulasi.id_siswa', '=', 'tbl_siswa.id_siswa')
            ->where('tbl_prekalkulasi.id_user', Auth::user()->id_user)->get();
            
        foreach ($dataSiswa as $key => $value) {
            $hasilKalkulasi = new HasilKalkulasi;
            $hasilKalkulasi->id_user = Auth::user()->id_user;
            $hasilKalkulasi->id_siswa = $dataSiswa[$key]['id_siswa'];
            $hasilKalkulasi->nama_jurusan = $this->penentuanJurusan($hasil_penjumlahan_kolom[$key]);
            $hasilKalkulasi->nilai = $hasil_penjumlahan_kolom[$key];
            $hasilKalkulasi->save();
        }

        alert()->success('Hore !','Berhasil Memutuskan Jurusan Siswa !');
        return back();
    }

    private function penentuanJurusan($data)
    {
        $jurusan = null;
            switch (true) {
                case ($data <= 0.125):
                    $jurusan = 'Bahasa Inggris';
                    break;
                case ($data <= 0.250):
                    $jurusan = 'Administrasi Niaga';
                    break;
                case ($data <= 0.375):
                    $jurusan = 'Teknik Informatika';
                    break;
                case ($data <= 0.5):
                    $jurusan = 'Teknik Sipil';
                    break;
                case ($data <= 0.625):
                    $jurusan = 'Teknik Elektro';
                    break;
                case ($data <= 0.75):
                    $jurusan = 'Teknik Mesin';
                    break;
                case ($data <= 0.875):
                    $jurusan = 'Teknik Perkapalan';
                    break;
                case ($data <= 1):
                    $jurusan = 'Maritim';
                    break;
            }

        return $jurusan;
    }

    public function hasilKeputusan(Request $request)
    {
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'Appisan',
            'title' => 'Hasil Keputusan',
            'segmentUrl' => $request->segments()[1],
            'dataHasil' => HasilKalkulasi::select('*')
                ->join('tbl_siswa', 'tbl_hasil_kalkulasi.id_siswa', '=', 'tbl_siswa.id_siswa')
                ->where('tbl_hasil_kalkulasi.id_user', Auth::user()->id_user)->paginate(100)
        ];
        return view('userPages.playPages.hasilKeputusan', $data);
    }

    public function hasilKeputusanHapus($id)
    {
        $a = DB::table('tbl_hasil_kalkulasi')->where('id_user', $id);
        if ($a->delete()) {
            alert()->success('Hore!','Data berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !','Data gagal di hapus !');
            return back();
        }
    }

    public function tambahSiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'kelas' => 'required|numeric',
            'jenis_kelamin' => 'required|min:5'
        ]);

        $user = new Siswa;
        $user->nama_siswa = $request->nama;
        $user->id_sekolah = Auth::user()->id_sekolah;
        $user->kelas = $request->kelas;
        $user->jenis_kelamin = $request->jenis_kelamin;

        if ($user->save()) {
            alert()->success('Hore!', 'Siswa berhasil di buat !');
            return back();
        } else {
            alert()->success('Waduhh !', 'Siswa gagal di buat !');
            return back();
        }
    }
}

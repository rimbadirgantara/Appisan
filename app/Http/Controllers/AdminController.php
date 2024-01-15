<?php
// sweet alert ref
// https://divisidev.com/post/sweet-alert-laravel

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Sekolah;
use App\Models\HasilKalkulasi;
use DB;

class AdminController extends Controller
{
    public function index(Request $request) {

        // bar chart
        $labelbarChart = [];
        $dataBarChart = [];
        $a = DB::table('tbl_hasil_kalkulasi')
        ->selectRaw('nama_jurusan, COUNT(*) as jumlah')
        ->groupBy('nama_jurusan')->get();
        foreach ($a as $a) {
            $labelbarChart[] = $a->nama_jurusan;
            $dataBarChart[] = $a->jumlah;
        }

        // pie chart
        $labelPieChart = [];
        $dataPieChart = [];
        $b = DB::table('tbl_siswa')
        ->join('tbl_sekolah', 'tbl_siswa.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
        ->selectRaw('nama_sekolah, COUNT(tbl_sekolah.nama_sekolah) as jumlah')
        ->groupBy('tbl_sekolah.nama_sekolah')->get();
        
        foreach($b as $b) {
            $labelPieChart[] = $b->nama_sekolah;
            $dataPieChart[] = $b->jumlah;
        }

        // guru chart
        $labelGuru = [];
        $dataGuru = [];
        $d = DB::table('tbl_users')
        ->join('tbl_sekolah', 'tbl_users.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
        ->selectRaw('nama_sekolah, COUNT(tbl_sekolah.nama_sekolah) as jumlah')
        ->groupBy('tbl_sekolah.nama_sekolah')->get();
        foreach($d as $d) {
            $labelGuru[] = $d->nama_sekolah;
            $dataGuru[] = $d->jumlah;
        }

        $data = [
            'appName' => 'Appisan',
            'title' => 'Dashboard Admin',
            'segmentUrl' => $request->segments()[1],

            'totalSiswa' => Siswa::all()->count(),
            'siswaLaki' => Siswa::where('jenis_kelamin', 'Laki-laki')->count(),
            'siswaPerempuan' => Siswa::where('jenis_kelamin', 'Perempuan')->count(),

            // bar chart
            'labelBar' => $labelbarChart,
            'dataBarChart' => $dataBarChart,

            // pie chart
            'labelPie' => $labelPieChart,
            'dataPieChart' => $dataPieChart,

            // guru
            'labelGuru' => $labelGuru,
            'dataGuru' => $dataGuru
        ]; 

        // dd($data['$dataPieChart']);
        return view('adminPages.playPages.index', $data);
    }
    
    public function profile(Request $request) {
        $data = [
            'appName' => 'Appisan',
            'title' => 'Admin Profile',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => User::where('id_user', Auth::user()->id_user)->first()
        ];
        
        return view('adminPages.playPages.profile', $data);
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
            if (file_exists('adminTemplate/assets/img/profileImage/'.$user->profile_pict)) {
                unlink('adminTemplate/assets/img/profileImage/'.$user->profile_pict);
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
 
    public function tambahGuruPage(Request $request){
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'Appisan',
            'title' => 'Guru',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => User::select('tbl_users.*', 'tbl_sekolah.*')
                                        ->join('tbl_sekolah', 'tbl_users.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                                        ->where('tbl_users.level', 'guru')->get(),
            'listSekolah' => Sekolah::all()
        ];

        return view('adminPages.playPages.user', $data); 
    }

    public function tambahUser(Request $request) {
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
        $user->level = $request->level;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->profile_pict = 'avatar.png';
        $user->password = Hash::make($request->password);
        $user->id_sekolah = $request->nama_sekolah;
        $user->kelas = $request->kelas;

        if ($user->save()) {
            alert()->success('Hore!','User berhasil di buat !');
            return back();
        } else {
            alert()->warning('Waduhh !','User gagal di buat !');
            return back();
        }
    }

    public function hapusUser($id) {
        $a = User::find($id);
        if ($a->delete()) {
            alert()->success('Hore!','User berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !','User gagal di hapus !');
            return back();
        }
    }

    public function editUser($id_user, Request $request){
        $data = [
            'appName' => 'Appisan',
            'title' => 'Edit Guru',
            'segmentUrl' => $request->segments()[1],
            'dataUser' => User::select('tbl_users.*', 'tbl_sekolah.*')
                            ->join('tbl_sekolah', 'tbl_users.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                            ->where('tbl_users.id_user', $id_user)->first(),
            'listSekolah' => Sekolah::all()
        ];
        if (!$data['dataUser']) {
            abort(404, 'Data tidak ditemukan !');
        }
        return view('adminPages.playPages.edit-user', $data);
    }

    public function doUpdateUser($id_user, Request $request){
        $user = User::find($id_user);
        if ($request->email === $user->email) {
            $emailRules = 'required|min:5';
        } else {
            $emailRules = 'required|min:5|unique:tbl_users,email|email:rcf,dns';
        }
        if ($request->username === $user->username) {
            $usernameRules = 'required|min:5';
        }else {
            $usernameRules = 'required|min:5|unique:tbl_users,username';
        }
        if ($request->password) {
            $pwRules = 'required|min:8';
        } else {
            $pwRules = '';
        }
        $request->validate([
            'username' => $usernameRules,
            'email' => $emailRules,
            'password' => $pwRules,
            'jenis_kelamin' => 'required|min:5',
            'nama_sekolah' => 'required|numeric',
            'kelas' => 'required|numeric'
        ]);
        
        $user->username = preg_replace("/\s+/", "", strtolower($request->username));
        $user->email = $request->email;
        $user->id_sekolah = $request->nama_sekolah;
        $user->kelas = $request->kelas;
        $user->jenis_kelamin = $request->jenis_kelamin;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            alert()->success('Hore!','Siswa berhasil di update !');
            return back();
        } else {
            alert()->success('Waduhh !','Siswa gagal di update !');
            return back();
        }
    }

    public function tambahSiswaPage(Request $request){
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'Appisan',
            'title' => 'Siswa',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => Siswa::select('tbl_siswa.*', 'tbl_sekolah.*')
                                        ->join('tbl_sekolah', 'tbl_siswa.id_sekolah', '=', 'tbl_sekolah.id_sekolah')->get(),
            'listSekolah' => Sekolah::all()
        ];

        return view('adminPages.playPages.siswa', $data); 
    }

    public function hapusSiswa($id) {
        $a = Siswa::find($id);
        if ($a->delete()) {
            alert()->success('Hore!','Siswa berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !','Siswa gagal di hapus !');
            return back();
        }
    }

    public function tambahSiswa(Request $request) {
        $request->validate([
            'nama' => 'required|min:5',
            'nama_sekolah' => 'required|numeric',
            'kelas' => 'required|numeric',
            'jenis_kelamin' => 'required|min:5',
        ]);
        
        $user = new Siswa;
        $user->nama_siswa = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->id_sekolah = $request->nama_sekolah;
        $user->kelas = $request->kelas;

        if ($user->save()) {
            alert()->success('Hore!','User berhasil di buat !');
            return back();
        } else {
            alert()->warning('Waduhh !','User gagal di buat !');
            return back();
        }
    }

    public function editSiswa($id, Request $request){
        $data = [
            'appName' => 'Appisan',
            'title' => 'Edit Siswa',
            'segmentUrl' => $request->segments()[1],
            'dataUser' => Siswa::select('tbl_siswa.*', 'tbl_sekolah.*')
                            ->join('tbl_sekolah', 'tbl_siswa.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                            ->where('tbl_siswa.id_siswa', $id)->first(),
            'listSekolah' => Sekolah::all()
        ];
        if (!$data['dataUser']) {
            abort(404, 'Data tidak ditemukan !');
        }
        return view('adminPages.playPages.siswa-edit', $data);
    }

    public function doUpdateSiswa($id_user, Request $request){
        $user = Siswa::find($id_user);
        $request->validate([
            'nama' => 'required|min:5',
            'nama_sekolah' => 'required|numeric',
            'kelas' => 'required|numeric',
            'jenis_kelamin' => 'required|min:5',
        ]);

        $user->nama_siswa = $request->nama;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->id_sekolah = $request->nama_sekolah;
        $user->kelas = $request->kelas;

        if ($user->save()) {
            alert()->success('Hore!','User berhasil di update !');
            return back();
        } else {
            alert()->warning('Waduhh !','User gagal di update !');
            return back();
        } 
    }

    public function dataKeputusan(Request $request) {
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'Appisan',
            'title' => 'Data Keputusan Siswa',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => Siswa::select('*')
                                        ->join('tbl_hasil_kalkulasi', 'tbl_siswa.id_siswa', '=', 'tbl_hasil_kalkulasi.id_siswa')
                                        ->join('tbl_sekolah', 'tbl_siswa.id_sekolah', '=', 'tbl_sekolah.id_sekolah')->get()
        ];

        return view('adminPages.playPages.dataKeputusan', $data);
    }

    public function hapusKalkulasi($id){
        $a = HasilKalkulasi::find($id);
        if ($a->delete()) {
            alert()->success('Hore!', 'Data berhasil di hapus !');
            return back();
        } else {
            alert()->error('Waduhh !', 'Data gagal di hapus !');
            return back();
        }
    }
}

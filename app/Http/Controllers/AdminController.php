<?php
// sweet alert ref
// https://divisidev.com/post/sweet-alert-laravel

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Sekolah;

class AdminController extends Controller
{
    public function index(Request $request) {
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'Dashboard Admin',
            'segmentUrl' => $request->segments()[1],

            'totalSiswa' => User::where('level', 'siswa')->count(),
            'siswaLaki' => User::where('jenis_kelamin', 'Laki-laki')->where('level', 'siswa')->count(),
            'siswaPerempuan' => User::where('jenis_kelamin', 'Perempuan')->where('level', 'siswa')->count()
        ];
        return view('adminPages.playPages.index', $data);
    }
    
    public function profile(Request $request) {
        $data = [
            'appName' => 'PinPilJur',
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
 
    public function tambahUserPage(Request $request){
        $title = 'Hapus Data!';
        $text = "Apakah yakin ingin hapus data ini ?";
        confirmDelete($title, $text);
        $data = [
            'appName' => 'PinPilJur',
            'title' => 'Siswa',
            'segmentUrl' => $request->segments()[1],

            'dataUser' => User::select('tbl_users.*', 'tbl_sekolah.*')
                                        ->join('tbl_sekolah', 'tbl_users.id_sekolah', '=', 'tbl_sekolah.id_sekolah')
                                        ->where('tbl_users.level', 'siswa')->paginate(100),
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
            alert()->success('Waduhh !','User gagal di buat !');
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
            'appName' => 'PinPilJur',
            'title' => 'Edit Siswa',
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SesiController extends Controller
{
    public function index() { return view('home'); }

    //Sesi saat melakukan login, Request untuk login yang belum bisa akan memberikan notifikasi
    function login(Request $request) {
        $request->validate(
            [ 'fUser' => 'required', 'fPass' => 'required', ],
            [ 'fUser.required' => 'User wajib di isi !',
              'fPass.required' => 'Password wajib di isi !', ]
            );

        //Check Login
        $ceklogin = [
            'user' => $request->fUser,
            'password' => $request->fPass,
        ];
        if (Auth::attempt($ceklogin)) {
            $level = Auth::user()->admin_type;
            if ($level == 'admin') {
                return redirect('/admin');
            }
            else if ($level == 'guest') {
                return Redirect('/guest');
            }
        } else {
            return redirect('/')->withErrors('Anda tidak dapat login')->withInput();
        }
    }

    //Fungsi logout
    function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}


//Amalia
// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth; //tambahkan kode ini untuk mendukung sesi auth
// use Illuminate\Support\Facades\Redirect;

// class SesiController extends Controller
// {
//     function index()
//     { return view('home');}

//     //request login yang belum terpenuhi akan menampilkan notifikasi
//     function login(Request $request)
//     {
//         $request->validate(
//             [
//                 'fUser' => 'required',
//                 'fPass' => 'required',
//             ],
//             [
//                 'fUser.required' => 'user wajib di isi !',
//                 'fPass.required' => 'password wajib di isi !',
//             ]
//         );

//         //Check Login
//         $ceklogin = [
//             'user' => $request->fUser,
//             'password' => $request->fPass,
//         ];
//         if (Auth::attempt($ceklogin)) {

//             //Tes Login
//             // echo "Login Berhasil";
//             // echo "<h2>" . Auth::user()->user . "</h2>";
//             // exit();

//             //Login masuk berdasarkan admin type
//             $level = Auth::user()->admin_type;
//             if ($level == 'admin') {
//                 return redirect('admin');
//             }
//             if ($level == 'guest') {
//                 return Redirect('guest');
//             }
//         } else {
//             return redirect('/')->withErrors('user dan password salah')->withInput();
//         }
//     }

//     //Fungsi logout
//     public function logout(Request $request){
//         Auth::logout();
//         $request->session()->flush(); //untuk menghapus seluruh sesi
//         $request->session()->invalidate(); //untuk hapus sebagian sesi
//         $request->session()->regenerateToken(); //regenerasi token csrf
//         return redirect('/');
//     }
// }

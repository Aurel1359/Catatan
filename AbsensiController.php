<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index() {
        $user=Auth::user();
        $absen=Absensi::with('siswa')->paginate(10);
        $siswa=Siswa::with('absensi')->paginate(10);
        return view('admin.absen', compact('user', 'absen', 'siswa'));
    }

    public function guest() {
        $user=Auth::user();
        $absen=Absensi::with('siswa')->paginate(10);
        return view('guest.absen', compact('user', 'absen', 'siswa'));
    }

    public function search(Request $request) {
        $keyword = $request->input('search');
        $query = Absensi::with('siswa');
        $siswa=Siswa::with('absensi')->paginate(10);

        if ($keyword){
            $query->whereHas('siswa', function ($q) use ($keyword) {
                $q->where('nis', 'like', '%{$keyword}%')
                ->orwhere('nama_siswa', 'like', '%{$keyword}%');
            });
        }

        $absensi = $query->paginate(10);
        return view('admin.absen', compact('absen', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


//Amalia
// <?php

// namespace App\Http\Controllers;

// use App\Models\Absensi;
// use App\Models\Siswa;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;

// class AbsensiController extends Controller
// {
//     /**
//      * Menampilkan daftar absensi untuk admin.
//      */
//     public function index()
//     {
//         $absensi = Absensi::with('siswa')->paginate(10);
//         $siswa = Siswa::with('absensi')->paginate(10);
//         return view('admin.absensi', compact('absensi', 'siswa'));
//     }

//     /**
//      * Menampilkan daftar absensi untuk guest.
//      */
//     public function guest(Request $request)
//     {
//         $keyword = $request->search;

//         $absensi = Absensi::whereHas('siswa', function ($query) use ($keyword) {
//             $query->where('nis', 'like', "%{$keyword}%")
//                   ->orWhere('nama_siswa', 'like', "%{$keyword}%")
//                   ->orWhere('kelas', 'like', "%{$keyword}%")
//                   ->orWhere('jurusan', 'like', "%{$keyword}%");
//         })->orWhere('keterangan', 'like', "%{$keyword}%")
//           ->orWhere('terlambat', 'like', "%{$keyword}%")
//           ->orWhere('poin', 'like', "%{$keyword}%")
//           ->orWhere('sanksi', 'like', "%{$keyword}%")
//           ->with('siswa')
//           ->paginate(10);

//         return view('guest.absensi', compact('absensi'))
//             ->with('i', (request()->input('page', 1) - 1) * 10);
//     }


//     /**
//      * Fungsi pencarian absensi berdasarkan NIS atau Nama Siswa.
//      */
//     public function search(Request $request)
//     {
//         $keyword = $request->search;

//         $absensi = Absensi::whereHas('siswa', function ($query) use ($keyword) {
//             $query->where('nis', 'like', "%{$keyword}%")
//                   ->orWhere('nama_siswa', 'like', "%{$keyword}%")
//                   ->orWhere('kelas', 'like', "%{$keyword}%")
//                   ->orWhere('jurusan', 'like', "%{$keyword}%");
//         })->orWhere('keterangan', 'like', "%{$keyword}%")
//           ->orWhere('terlambat', 'like', "%{$keyword}%")
//           ->orWhere('poin', 'like', "%{$keyword}%")
//           ->orWhere('sanksi', 'like', "%{$keyword}%")
//           ->with('siswa')
//           ->paginate(10);

//         $siswa = Siswa::with('absensi')->paginate(10);

//         $level = Auth::check() ? Auth::user()->admin_type : 'guest';

//         if ($level == 'admin') {
//             return view('admin.absensi', compact('absensi', 'siswa'))
//                 ->with('i', (request()->input('page', 1) - 1) * 10);
//         } else {
//             return view('guest.absensi', compact('absensi', 'siswa'))
//                 ->with('i', (request()->input('page', 1) - 1) * 10);
//         }
//     }

//     public function store(Request $request)
//     {
//         // Validasi input
//         $validator = Validator::make($request->all(), [
//             'nis' => 'required|integer',
//             'kedatangan' => 'required|date',
//             'keterangan' => 'required|string',
//             'terlambat' => 'required|string',
//             'poin' => 'required|string',
//             'sanksi' => 'required|string',
//         ]);
//         //check if validation fails
//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator)->withInput();
//         }
//         // Simpan ke database
//         $simpan = Absensi::create([
//             'nis' => $request->nis,
//             'masuk' => $request->kedatangan,
//             'keterangan' => $request->keterangan,
//             'terlambat' => $request->terlambat,
//             'poin' => $request->poin,
//             'sanksi' => $request->sanksi,
//         ]);
//         if ($simpan) {
//             //redirect dengan pesan sukses
//             return redirect('/admin/absensi')->with(['success' => 'Absensi Sukses Disimpan']);
//         } else {
//             //redirect dengan pesan error
//             return redirect('/admin/absensi')->with(['error' => 'Absensi Gagal Disimpan!']);
//         }
//     }

//     public function edit(string $id)
//     {
//         $data=Absensi::find($id);
//         return view('admin.absensi',compact(['data']));
//     }

//     public function update(Request $request, string $id)
//     {
//         $upd = Absensi::find($id);
//             $upd->update([
//                 'nis' => $request->niss, //ns adalah name dari input form
//                 'masuk' => $request->datang, //datang adalah name dari input form
//                 'keterangan' => $request->ket, //ket adalah name dari input form
//                 'terlambat' => $request->telat, //lambat adalah name dari input form
//                 'poin' => $request->poins, //point adalah name dari input form
//                 'sanksi'=> $request->eksekusi, //sangsi adalah name dari input form
//             ]);
//         if($upd){
//             return redirect('/admin/absensi')->with(['success'=>'Data Sukses diubah']);
//         }else{
//             return redirect('/admin/absensi')->with(['error'=>'Data gagal diubah']);
//         }
//     }

//     public function destroy(string $id)
//     {
//         $del = Absensi::find($id);
//         $del->delete();
//         //perintah untuk hapus
//         if ($del) {
//             return redirect('/admin/absensi')->with(['success' => 'Data Berhasil Dihapus!']);
//         } else {
//             //redirect dengan pesan error
//             return redirect('/admin/absensi')->with(['error' => 'Data Gagal Dihapus!']);
//         }
//     }
// }

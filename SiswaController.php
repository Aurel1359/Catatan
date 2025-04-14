<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $data=Siswa::paginate(10);
        return view('admin.siswa', compact('user', 'data'));
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

// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Log; // Pastikan untuk mengimpor facade
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\QueryException;
// use Illuminate\Http\Request;
// use App\Models\Siswa;

// class SiswaController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $data = Siswa::paginate(10);
//         $user = Auth::user();
//         return view('admin.siswa', compact('data'));
//     }
//     public function search(Request $request)
//     {
//         $keyword = $request->input('search');
//         $query = Siswa::query();

//         // Filter berdasarkan NIS atau Nama
//         if ($keyword) {
//             $query->where(function ($q) use ($keyword) {
//                 $q->where('nis', 'like', "%{$keyword}%")
//                   ->orWhere('nama_siswa', 'like', "%{$keyword}%")
//                   ->orWhere('kelas', 'like', "%{$keyword}%")
//                   ->orWhere('jurusan', 'like', "%{$keyword}%");
//             });
//         }

//         // Ambil data dengan pagination
//         $data = $query->paginate(10);
//         return view('admin.siswa', compact('data'));
//     }
//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */

//     public function store(Request $request)
//     {
//         // dd($request->all());
//         $validator = Validator::make($request->all(), [
//             'nis' => 'required|unique:siswa,nis',
//             'nm_siswa' => 'required',
//             'kls' => 'required',
//             'jurusan' => 'required',
//         ], [
//             'nis.unique' => 'NIS sudah terdaftar!',
//             'nis.required' => 'NIS wajib diisi!',
//             'nm_siswa.required' => 'Nama wajib diisi!', // Perbaikan di sini
//             'kls.required' => 'Kelas wajib diisi!',
//             'jurusan.required' => 'Jurusan wajib diisi!',
//         ]);


//         // Check if validation fails
//         if ($validator->fails()) {
//             return redirect()->back()->withErrors($validator)->withInput();
//         }
//         // Create post
//         $simpan = Siswa::create([
//             'nis' => $request->nis,
//             'nama_siswa' => $request->nm_siswa, // Perbaikan di sini
//             'kelas' => $request->kls,
//             'jurusan' => $request->jurusan,
//         ]);

//         if ($simpan) {
//             // Redirect dengan pesan sukses
//             return redirect('/admin/siswa')->with(['success' => 'Data Sukses Disimpan']);
//         } else {
//             // Redirect dengan pesan error
//             return redirect('/admin/siswa')->with(['error' => 'Data Gagal Disimpan!']);
//         }
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id_siswa)
//     {
//         $data = Siswa::find($id_siswa);
//         //ubah adalah pengambilan data dari variabel $ubah, namanya harus sama
//         return view('admin.siswa', compact(['data']));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id_siswa)
//     {
//         $upd = Siswa::find($id_siswa);
//         $upd->update([
//             'nis' => $request->nis,
//             'nama_siswa' => $request->nm_siswa,
//             'kelas' => $request->kls,
//             'jurusan' => $request->jurusan,
//         ]);

//         if ($upd) {
//             return redirect('/admin/siswa')->with(['success' => 'Data Sukses diubah']);
//         } else {
//             return redirect('/admin/siswa')->with(['error' => 'Data gagal diubah']);
//         }
//     }
//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id_siswa)
//     { {
//             $del = Siswa::find($id_siswa);
//             $del->delete();
//             //perintah untuk hapus
//             if ($del) {
//                 return redirect('/admin/siswa')->with(['success' => 'Data Berhasil Dihapus']);
//             } else {
//                 //redirect dengan pesan error
//                 return redirect('/admin/siswa')->with(['error' => 'Data Gagal Dihapus']);
//             }
//         }
//     }
// }
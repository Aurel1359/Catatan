<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\SesiController;
use App\Http\Controller\UserController;
use App\Http\Controller\GuestController;
use App\Http\Controller\AbsensiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     //return view('welcome');
//     return view('home');
// });

Route::get('/', [SesiCntroller::class, 'index']);
Route::post('/', [SesiCntroller::class, 'login']);

Route::get('/admin', [UserCntroller::class, 'index']);
Route::get('/', [GuestCntroller::class, 'index']);

Route::get('/logout', [SesiCntroller::class, 'logout']);

Route::resource('/admin/siswa', SiswaCntroller::class);

Route::resource('/admin/absensi', AbsensiCntroller::class);
Route::resource('/guest/absensi', [AbsensiCntroller::class, 'guest']);


//Amalia 
// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SesiController; //untuk mengaitkan dengan filenya
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\GuestController;
// use App\Http\Controllers\CekUserController;
// use App\Http\Controllers\SiswaController;
// use App\Http\Controllers\AbsensiController;
// use App\Models\Absensi;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// // Route::get('/', function () { return view('home');});

// Route::middleware(['guest'])->group(function(){
//     Route::get('/', [SesiController::class,'index'])->name('login');
//     Route::post('/', [SesiController::class,'login']);
// });

// Route::middleware(['auth'])->group(function(){
//     Route::group(['middleware' => ['cekUser:admin']], function(){
//         Route::get('/admin', [UserController::class,'index'])->middleware('cekUser:admin');
//         Route::resource('/admin/user',UserController::class);
//         Route::resource('/admin/siswa',SiswaController::class);
//         Route::delete('/admin/siswa/{id_siswa}',[SiswaController::class,'destroy']); //Delete data siswa
//         Route::put('/admin/siswa/{id}', [SiswaController::class, 'update']); //Ubah data siswa
//         Route::get('/admin/siswa', [SiswaController::class, 'search'])->name('search'); //fitur search data siswa

//         Route::resource('/admin/absensi',AbsensiController::class);
//         Route::post('/admin/absensi', [AbsensiController::class, 'store'])->name('admin.absensi.store');  //Tambah data absensi
//         Route::get('/admin/absensi', [AbsensiController::class, 'search'])->name('admin.absensi.search'); //fitur search absensi
//         Route::delete('/admin/absensi/{id}',[AbsensiController::class,'destroy']); //Delete data absensi
//         Route::put('/admin/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
//     });
//     Route::group(['middleware' => ['cekUser:guest']], function(){
//         Route::get('/guest', [GuestController::class,'index'])->middleware('cekUser:guest');
//         Route::get('/guest/absensi', [AbsensiController::class, 'guest'])->name('guest.absensi');

//     });
//     Route::get('/logout', [SesiController::class,'logout']);
// });
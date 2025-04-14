<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $pengguna = Auth::user();
        return view('admin.index', compact('pengguna'));
    }
}


//Amalia
// use Illuminate\Support\Facades\Auth;
// <!-- Tambahkan --
//     public function index()
//     {
//         $pengguna = Auth::user();
//         return view('admin.index', compact('pengguna'));
//     }
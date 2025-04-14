<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    function index()
    {
        $pengguna = Auth::user();
        return view('guest.index', compact('pengguna'));
    }
}


//Amalia
// use Illuminate\Support\Facades\Auth;
// <!-- Tambahkan -->
// class GuestController extends Controller
// {
//     function index()
//     {
//         $pengguna = Auth::user();
//         return view('guest.index', compact('pengguna'));
//     }
// }
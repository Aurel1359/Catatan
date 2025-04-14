<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class cekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}


//Amalia
// <?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
// use Symfony\Component\HttpFoundation\Response;

// class cekUser
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next, $levels): Response
//     {
//         if(auth()->user()->admin_type == $levels){
//             // return $next($request);
//             $response = $next($request);

//             //setelah logout kode tidak dapat kembali
//             $headers =[
//                 'Cache-Control' => 'nocache, no-store, max-age=0, must-revalidate',
//                 'Pragma','no-cache',
//                 'Expires','fri,01 Jan 1990 00:00:00 GMT',
//             ];

//             foreach($headers as $key => $value){
//                 $response->headers->set($key,$value);
//             }
//             return $response;
//         }else{
//             // return response()->json(['Anda tidak dapat mengakses halaman ini']);
//             if (auth()->user()->admin_type == 'admin'){
//                 return redirect('admin');
//             }elseif (auth()->user()->admin_type == 'guest'){
//                 return redirect('guest');
//             }else{
//                 return Redirect('/');
//             }
//         }
//     }
// }

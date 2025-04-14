<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}


//Amalia
// <?php

// namespace App\Http\Middleware;

// use App\Providers\RouteServiceProvider;
// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Redirect;
// use Symfony\Component\HttpFoundation\Response;

// class RedirectIfAuthenticated
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next, string ...$guards): Response
//     {
//         // $guards = empty($guards) ? [null] : $guards;

//         // foreach ($guards as $guard) {
//         //     if (Auth::guard($guard)->check()) {
//         //         return redirect(RouteServiceProvider::HOME);
//         //     }
//         // }

//         // return $next($request);

//         //login sebagai siswa tidak dapat mengakses halaman admin
//         if(Auth::guard()->check()){
//             $user = Auth::user();

//             if($user->admin_type == 'admin'){
//                 return Redirect('/admin');
//             }elseif($user->admin_type == 'guest'){
//                 return redirect('/guest');
//             }
//         }
//         return $next($request);
//     }
// }
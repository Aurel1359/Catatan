<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}


//Amalia
// <!-- Tambahkan -->
// use Illuminate\Foundation\Http\Kernel as HttpKernel;
// 'cekUser' => \App\Http\Middleware\cekUser::class, //mengecek user

// //setelah di atas
// Tambahkan sweet alert atau toastr :

// composer require yoeunes/toastr
// php artisan flasher:install
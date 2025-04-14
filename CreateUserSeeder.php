<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    public function run(): void {
        $users= [
            [
                'user' => 'admin',
                'password' =>bcrypt('1234'),
                'admin_type' => 'admin',
            ],
            [
                'user' => 'siswa',
                'password' =>bcrypt('123'),
                'admin_type' => 'guest',
            ],
        ];
        foreach ($users as $key => $val){
            User::create($val);
        }
    }
}


//Amalia
// <?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\User;
// use Illuminate\Database\Seeder;

// class CreateUserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         $users=
//         [
//             [
//                 'user' => 'admin',
//                 'password' =>bcrypt('1234'),
//                 'admin_type' => 'admin',
//             ],
//             [
//                 'user' => 'siswa',
//                 'password' =>bcrypt('s123'),
//                 'admin_type' => 'guest',
//             ],
//         ];
//         foreach ($users as $key => $val){
//             User::create($val);
//         }
//     }
// }

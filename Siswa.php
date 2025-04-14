<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_siswa';
    protected $table = 'siswa';
    public $timestamps = false;

    protected $fillable= [
        'nis', 'nama_siswa', 'kelas', 'jurusan',
    ];

    //relations HasMany
    public function absensi():HasMany
    {
        return $this->hasMany(Absensi::class,'nis','nis');
    }
}


//Amalia
// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Model;

// class Siswa extends Model
// {
//     use HasFactory;
//     protected $primaryKey = 'id_siswa';
//     protected $table = 'siswa';
//     public $timestamps = false;

//     protected $fillable=[
//         'nis',
//         'nama_siswa',
//         'kelas',
//         'jurusan',
//     ];

//     //relations HasMany
//     public function absensi():HasMany
//     {
//         return $this->hasMany(Absensi::class,'nis','nis');
//     }
// }
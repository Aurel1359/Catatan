<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Absensi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'absensi';
    public $timestamps = false;

    protected $fillable =[
        'nis', 'masuk', 'keterangan', 'terlambat', 'poin', 'sanksi',
    ];

    protected $casts = [
        'masuk' => 'timestamp:m-d-Y',
    ];

    public function siswa():BelongsTo
    {
        return $this->belongsTo(Siswa::class,'nis','nis');
    }
}


//Amalia
// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Model;

// use function PHPUnit\Framework\returnSelf;

// class Absensi extends Model
// {
//     use HasFactory;
//     protected $primaryKey = 'id';
//     protected $table = 'absensi';
//     public $timestamps = false;

//     protected $fillable =[
//         'nis',
//         'masuk',
//         'keterangan',
//         'terlambat',
//         'poin',
//         'sanksi',
//     ];

//     protected $casts = [
//         'masuk' => 'timestamp:m-d-Y',
//     ];

//     public function siswa():BelongsTo
//     {
//         return $this->belongsTo(Siswa::class,'nis','nis');
//     }
// }
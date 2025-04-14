<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi Siswa</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    @include('layouts.headguest')
    <div class="container mt-4">
        <p class="col-md-12 mb-0 text-muted">
            <h3 class="mb-4"> Selamat datang di Halaman
                <font color="blue">
                    {{ Auth::user()->admin_type }}
                </font>
            </h3> <br>
            Silahkan Anda klik menu Absensi untuk melihat data kedisiplinan Siswa
        </p>
            <!--<div class="mt-5 p-4 bg-white shadow-sm rounded">
                <h5>💡 Info:</h5>
                <p>Panel ini memudahkan siswa siswi mengakses data terlambat.</p>
            </div>-->
        </div>
    @include('layouts.footer')
</body>
</html>


<!-- Amalia -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi Siswa</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    @include('layouts.headguest')
    <div class="container mt-4">
        <p class="col-md-12 mb-0 text-muted">
            <h2 class="mb-4">Selamat datang di Halaman
                <font color="blue">
                    {{ Auth::user()->admin_type }}
                </font>
            </h2>
            <div class="mt-5 p-4 bg-white shadow-sm rounded">
                <h5>💡 Info:</h5>
                <p>Panel ini memudahkan siswa siswi mengakses data terlambat.</p>
            </div>
        </div>
    @include('layouts.footer')
</body>
</html> -->

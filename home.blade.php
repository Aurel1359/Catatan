<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Absensi USK </title>
</head>
<body>
@extends('layouts.app') 
@section('content')
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <h2> Login Form </h2> </hr>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $item )
                            <li> {{$item}} </li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="POST">
                    @csrf
                    <!-- User input -->
                    <div ata-mdb-input-init class="form-outline mb-4">
                        <label class="form-label"> User </label>
                        <input type="text" name="fUser" value="{{old('fUser')}}" class="form-control form-control-md"
                               placeholder="Username..." />
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <label class="form-label"> Password </label>
                        <input type="password" name="fPass" class="form-control form-control-md"
                               placeholder="Password..." />
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-md"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;"> Login </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
</body>
</html>


<!-- Amalia -->
<!-- @extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!- Link Bootstrap 5 (KOMEN)->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!- Link Font Bold (KOMEN)->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
        <style>

            /* Style Section Login */
            .login-container {
                padding-top: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .login-form {
                width: 100%;
                max-width: 400px;
                padding: 30px;
                border: 1px solid #ddd;
                border-radius: 10px;
                background: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .login-form h2 {
                margin-bottom: 20px;
            }
            .form-outline {
                margin-bottom: 15px;
            }

            /* Style Navigation Bar */
            .navbar {
                padding: 0;
                background-color: #f9f9f9;
            }
            .navbar .navbar-brand {
                padding: 10px 15px;
            }
            .navbar-brand img {
                height: 38px;
                margin-right: 8px;
            }
        </style>
    </head>
    <body>
        <!- Form Login (KOMEN)->
        <div class="login-container">
            <div class="login-form">
                <h2>Login Form</h2><hr>

                <!- Mengonfirmasi dan mengirim validasi error (KOMEN)->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!- Input Data Form Login (KOMEN->
                <form action="" method="POST">
                    @csrf
                    <!- Section Input User (KOMEN)->
                    <div class="form-outline">
                        <label class="form-label">User</label>
                        <input type="text" name="fUser" value="{{ old('fUser') }}" class="form-control"
                            placeholder="Username" />
                    </div>

                    <!- Section Input Password (KOMEN)->
                    <div class="form-outline">
                        <label class="form-label">Password</label>
                        <input type="password" name="fPass" class="form-control" placeholder="Password" />
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-4">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
@endsection -->



<!--resources/
└── views/
    ├── home.blade.php               # Halaman awal aplikasi (sebelum login)
    ├── layouts/                     # Layout-template yang dipakai bersama
    │   ├── header.blade.php         # Header umum
    │   ├── footer.blade.php         # Footer umum
    │   ├── app.blade.php            # Layout master utama
    │   ├── headadmin.blade.php      # Header untuk halaman admin
    │   └── headguest.blade.php      # Header untuk halaman guest
    ├── admin/                       # Halaman khusus role admin
    │   ├── index.blade.php          # Dashboard admin setelah login
    │   ├── siswa.blade.php          # CRUD data siswa
    │   ├── admin.blade.php          # CRUD user/admin lain (TIDAK USAH)
    │   └── absensi.blade.php        # CRUD data absensi siswa
    └── guest/                       # Halaman khusus role guest
        ├── index.blade.php          # Dashboard guest setelah login
        └── absensi.blade.php        # View data absensi lengkap (readonly, dengan search/filter)-->
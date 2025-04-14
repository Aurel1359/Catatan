<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Absensi USK </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" ></script>
</head>
<body style="background-color: hsl(125, 72%, 49%)">
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.header') 
        <div class="main-content">
            @yield('content')
        </div>
            @include('layouts.footer')
        </div>
    </div>
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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
</head>

<body style="background-color: #ffffff">
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.header')
            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
</body>
</html> -->

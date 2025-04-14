<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Absensi USK </title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    @include('layouts.headadmin')
    <div class="container">
        <h3 class="mt-4"> Data Absensi </h3>
        <form id="searchForm" class="col-12 col-lg-auto mb-2 mb-lg-0 me-sm-auto" role="search" 
              action="/guest/absen" method="GET">
        @csrf
            <label for="search"> Masukkan NIS atau Nama Siswa : </label>
            <input class="form-control w-25 d-inline input-sm" type="text" name="search" id="search"
                   value="{{ request('search') }}" placeholder="Masukkan NIS atau Nama siswa...">
               <button type="submit" class="btn btn-success btn-sm" > Cari </button>
        </form> <br>
        @if ($absen->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama Siswa </th>
                        <th> Kelas </th>
                        <th> Jurusan </th>
                        <th> Kedatangan </th>
                        <th> Terlambat </th>
                        <th> Poin </th>
                        <th> Sanksi </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($absen as $dt)
                    <tr>
                        <td> {{ $no++ }} </td>
                        <td> {{$dt->nis}} </td>
                        <td> {{$dt->siswa->nama_siswa}} </td>
                        <td> {{$dt->siswa->kelas}} </td>
                        <td> {{$dt->siswa->jurusan}} </td>
                        <td> {{$dt->masuk}} </td>
                        <td> {{$dt->terlambat}} </td>
                        <td> {{$dt->poin}} </td>
                        <td> {{$dt->sanksi}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $absen->links() }}
    </div>
    @else
    <p> Tidak ada Data  </p>
    @endif
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
@include('layouts.footer') 
</body>
</html>


<!-- Amalia -->
<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi Siswa</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.headguest')
    <div class="container">
        <h3 class="mt-4">Data Absensi</h3>

        <!- Modal Search Data Bedasarkan Nis atau Nama (KOMEN)->
        <form id="searchForm" class="col-12 col-lg-auto mb-2 mb-lg-0 me-sm-auto" role="search"
            action="{{ route('guest.absensi') }}" method="GET">
            <label for="search">Search Data Yang Akan Dicari :</label>
            <input class="form-control w-25 d-inline input-sm" type="text" name="search" id="search"
                value="{{ request('search') }}" placeholder="Berdasarkan NIS, Nama, Kelas dll">
            <button type="submit" class="btn btn-success btn-sm">Cari</button>
        </form><br>
        @if ($absensi->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover table-borderless">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Masuk</th>
                            <th>Keterangan</th>
                            <th>Terlambat</th>
                            <th>Poin</th>
                            <th>Sanksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensi as $index => $dtab)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $dtab->siswa->nis }}</td>
                                <td>{{ $dtab->siswa->nama_siswa }}</td>
                                <td>{{ $dtab->siswa->kelas }}</td>
                                <td>{{ $dtab->siswa->jurusan }}</td>
                                <td>{{ $dtab->masuk }}</td>
                                <td>{{ $dtab->keterangan }}</td>
                                <td>{{ $dtab->terlambat }}</td>
                                <td>{{ $dtab->poin }}</td>
                                <td>{{ $dtab->sanksi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $absensi->links() }}
        @else
            <p>Tidak ada Data</p>
        @endif
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @include('layouts.footer')
</body>
</html> -->

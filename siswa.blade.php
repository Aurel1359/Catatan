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
        <h3 class="mt-4"> Data Siswa 
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
            data-bs-target="#tambah"> Tambah </button>
        </h3>
        @if ($data->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead class="table-dark">
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Kelas </th>
                        <th> Jurusan </th>
                        <th> Proses Data </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($data as $dt) 
                    <tr>
                        <td> {{ $no++ }} </td>
                        <td> {{$dt->nis}} </td> 
                        <td> {{$dt->nama_siswa}} </td>
                        <td> {{$dt->kelas}} </td>
                        <td> {{$dt->jurusan}} </td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" 
                                data-bs-toggle="modal" data-bs-target="#ubah{{$dt->id_siswa}}"> Ubah </button>
                            <button type="button" class="btn btn-danger btn-sm" 
                                data-bs-toggle="modal" data-bs-target="#hapus{{$dt->id_siswa}}"> Hapus </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $data->links() }}
    </div>
    @else
    <p> Tidak ada Data </p>
    @endif
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
    <!- Modal Body (KOMEN)->
    <!- Memanggil header headadmin dari folder layouts (KOMEN)->
    @include('layouts.headadmin')

    <!- Menambahkan title button tambah dan search (KOMEN)->
    <div class="container">
        <h3 class="mt-4"> Data Siswa
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#tambah">Tambah</button>
        </h3>

        <!- Modal Search Data Bedasarkan Nis atau Nama (KOMEN)->
        <form id="searchForm" class="col-12 col-lg-auto mb-2 mb-lg-0 me-sm-auto" role="search" action="/admin/siswa"
            method="GET">
            @csrf
            <label for="search">Search Data Yang Akan Dicari :</label>
            <input class="form-control w-25 d-inline input-sm" type="text" name="search" id="search"
                value="{{ request('search') }}" placeholder="Berdasarkan Nama, Kelas, Jurusan">
            <button type="submit" class="btn btn-success btn-sm">Cari</button>
        </form><br>
        @if (request('search'))
            <p class="text-muted">Menampilkan hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
        @endif

        <!- Modal Tabel masih kosong (KOMEN)->
        @if ($data->isNotEmpty())

            {{-- modal create table dan input data --}}
            <div class="table-responsive">
                <table class="table table-hover table-borderless">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Proses Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($data as $dts)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dts->nis }}</td>
                                <td>{{ $dts->nama_siswa }}</td>
                                <td>{{ $dts->kelas }}</td>
                                <td>{{ $dts->jurusan }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ubah{{ $dts->id_siswa }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapus{{ $dts->id_siswa }}">Hapus</button>
                                </td>
                            </tr>

                            <!- Modal Hapus (KOMEN)->
                            <div class="modal fade" id="hapus{{ $dts->id_siswa }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Siswa</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="text-center">Apakah anda yakin menghapus <br> data siswa<span>
                                                    <font color="blue">"{{ $dts->nama_siswa }}"</font>
                                                </span>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/admin/siswa/{{ $dts->id_siswa }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak Jadi!</button>
                                                <button type="submit" class="btn btn-danger">Hapus!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!- Modal Ubah Siswa (KOMEN)->
                            <div class="modal fade" id="ubah{{ $dts->id_siswa }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="create-depot-form" action="/admin/siswa/{{ $dts->id_siswa }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row g-1">
                                                    <div class="col-md">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="nis"
                                                                value="{{ $dts->nis }}" required>
                                                            <label for="floatingInputGrid">NIS</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class="col-md">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="nm_siswa"
                                                                value="{{ $dts->nama_siswa }}" required>
                                                            <label for="floatingInputGrid">Nama Siswa</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="kls" required>
                                                                <option>{{ $dts->kelas }}</option>
                                                                <option value="X">X</option>
                                                                <option value="XI">XI</option>
                                                                <option value="XII">XII</option>
                                                            </select>
                                                            <label for="floatingInputGrid">Kelas</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="jurusan" required>
                                                                <option>{{ $dts->jurusan }}</option>
                                                                <option value="DKV 1">DKV 1</option>
                                                                <option value="DKV 2">DKV 2</option>
                                                                <option value="TKJ">TKJ</option>
                                                                <option value="RPL">RPL</option>
                                                            </select>
                                                            <label for="floatingInputGrid">Jurusan</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $data->links() }}
    </div>
    {{-- <div class="d-flex justify-content-right">
        {{!! $dt->links() !!}}
    </div> --}}
@else
    <p>Tidak ada Data</p>
    @endif

    <!- Modal Tambah Siswa (KOMEN)->
    <div class="modal fade" id="tambah" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create-depot-form" action="/admin/siswa" method="POST">
                        @csrf
                        <div class="row g-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nis" placeholder="nis"
                                        required>
                                    <label for="floatingInputGrid">NIS</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nm_siswa" placeholder="nama"
                                        required>
                                    <label for="floatingInputGrid">Nama Siswa</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="kls" id="kls" required>
                                        <option value="">-- pilih --</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    <label for="floatingInputGrid">Kelas</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="jurusan" id="jurusan" required>
                                        <option value="">-- pilih --</option>
                                        <option value="DKV 1">DKV 1</option>
                                        <option value="DKV 2">DKV 2</option>
                                        <option value="TKJ">TKJ</option>
                                        <option value="RPL">RPL</option>
                                    </select>
                                    <label for="floatingInputGrid">Jurusan</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!- Memanggil footer dari folder layouts (KOMEN)->
    @include('layouts.footer')
</body>
</html> -->

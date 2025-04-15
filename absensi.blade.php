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
        <h3 class="mt-4"> Data Absensi 
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#tambah"> Tambah </button>
        </h3>
        <form id="searchForm" class="col-12 col-lg-auto mb-2 mb-lg-0 me-sm-auto" role="search" 
              action="/admin/absen" method="GET">
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
                        <th> Proses Data </th>
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
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#ubah{{$dt->id}}"> Ubah </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{$dt->id}}"> Hapus </button>
                        </td>
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

    {{-- modal body --}}
    <!- Memanggil header headadmin dari folder layouts (Komen)->
    @include('layouts.headadmin')
    <div class="container">
        <h3 class="mt-4">Data Absensi
            <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                data-bs-target="#tambah">Tambah</button>
        </h3>

        <!- Modal Search Data Bedasarkan Nis atau Nama (Komen)->
        <form id="searchForm" class="col-12 col-lg-auto mb-2 mb-lg-0 me-sm-auto" role="search"
            action="{{ route('admin.absensi.search') }}" method="GET">
            <label for="search">Search Data Yang Akan Dicari :</label>
            <input class="form-control w-25 d-inline input-sm" type="text" name="search" id="search"
                value="{{ request('search') }}" placeholder="Berdasarkan NIS, Nama, Kelas dll">
            <button type="submit" class="btn btn-success btn-sm">Cari</button>
        </form><br>
        @if ($absensi->isEmpty())
            <tr>
                <td colspan="7" class="text-center">Tidak ada data absensi yang ditemukan.</td>
            </tr>
        @endif

        {{-- modal table yang masih kosong --}}
        @if ($absensi->isNotEmpty())

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
                            <th>Masuk</th>
                            <th>Keterangan</th>
                            <th>Terlambat</th>
                            <th>Poin</th>
                            <th>Sanksi</th>
                            <th>Proses Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?> 
                        @foreach ($absensi as $dtab)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dtab->nis }}</td>
                                <td>{{ $dtab->siswa->nama_siswa }}</td>
                                <td>{{ $dtab->siswa->kelas }}</td>
                                <td>{{ $dtab->siswa->jurusan }}</td>
                                <td>{{ $dtab->masuk }}</td>
                                <td>{{ $dtab->keterangan }}</td>
                                <td>{{ $dtab->terlambat }}</td>
                                <td>{{ $dtab->poin }}</td>
                                <td>{{ $dtab->sanksi }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ubah{{ $dtab->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapus{{ $dtab->id }}">Hapus</button>
                                </td>
                            </tr>

                            <!- Modal Hapus (Komen)->
                            <div class="modal fade" id="hapus{{ $dtab->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Absensi Siswa</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="text-center">Apakah anda yakin untuk <br> menghapus data
                                                absensi<span>
                                                    <font color="blue">"{{ $dtab->siswa->nama_siswa }}"</font>
                                                </span>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/admin/absensi/{{ $dtab->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal"> Tidak Jadi</button>
                                                <button type="submit" class="btn btn-danger">Hapus!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!- Modal Ubah Absensi (Komen)->
                            <div class="modal fade" id="ubah{{ $dtab->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class ="modal-title" id="exampleModalLabel">Ubah Absensi Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="create-depot-form"
                                                action="{{ route('absensi.update', $dtab->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" id="ubah_id" name="id">
                                                <div class="row g-1">
                                                    <div class="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="niss" id="ubah_niss"
                                                                required>
                                                                <option> {{ $dtab->nis }}</option>
                                                                @foreach ($siswa as $dts)
                                                                    <option value="{{ $dts->nis }}"
                                                                        data-nama="{{ $dts->nama }}"
                                                                        data-kelas="{{ $dts->kelas }}"
                                                                        data-jurusan="{{ $dts->jurusan }}">
                                                                        {{ $dts->nis }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="floatingInputGrid">NIS:</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class ="col-md">
                                                        <div class="form-floating">
                                                            <input type="text" class ="form-control"
                                                                name="nama_siswa" id="ubah_nama"
                                                                value="{{ $dtab->siswa->nama_siswa }}" required>
                                                            <label for ="floatingInputGrid">Nama Siswa</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-2">
                                                    <div class ="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" id= "ubah_kelas"
                                                                name="kelas" readonly>
                                                                <option>{{ $dtab->siswa->kelas }}</option>
                                                                <option value="X">X</option>
                                                                <option value="XI">XI</option>
                                                                <option value="XII">XII</option>
                                                            </select>
                                                            <label for ="floatingInputGrid">Kelas</label>
                                                        </div>
                                                    </div>
                                                    <div class ="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" id= "ubah_jur"
                                                                name="jur" readonly>
                                                                <option>{{ $dtab->siswa->jurusan }}</option>
                                                                <option value="DKV 1">DKV 1</option>
                                                                <option value="DKV 2">DKV 2</option>
                                                                <option value="TKJ">TKJ</option>
                                                                <option value="RPL">RPL</option>
                                                            </select>
                                                            <label for ="floatingInputGrid">Jurusan</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class ="col-md">
                                                        <div class="form-floating">
                                                            <input type="datetime-local" class="form-control"
                                                                id="ubah_datang" name="datang"
                                                                value="{{ $dtab->masuk }}">
                                                            <label for ="floatingInputGrid">Tanggal Kedatangan</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class ="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" id= "ubah_ket"
                                                                name="ket" required>
                                                                <option>{{ $dtab->keterangan }}</option>
                                                                <option value="Hadir">Hadir</option>
                                                                <option value="Sakit">Sakit</option>
                                                                <option value="Izin">Izin</option>
                                                                <option value="Alpa">Alpa</option>
                                                            </select>
                                                            <label for="floatingInputGrid">Keterangan</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class="col-md">
                                                        <div class="form-floating">
                                                            <select class="form-control" id= "ubah_telat"
                                                                name="telat" readonly>
                                                                <option>{{ $dtab->terlambat }}</option>
                                                                <option value="Terlambat">Terlambat</option>
                                                                <option value="-">-</option>
                                                            </select>
                                                            <label for="floatingInputGrid">Terlambat</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row g-1">
                                                    <div class ="col-md">
                                                        <div class="form-floating">
                                                            <div class="form-floating">
                                                                <select class="form-control" id= "ubah_poins"
                                                                    name="poins" readonly>
                                                                    <option>{{ $dtab->poin }}</option>
                                                                    <option value="1">1</option>
                                                                    <option value="3">3</option>
                                                                </select>
                                                                <label for="floatingInputGrid">Poin</label>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="row g-1">
                                                        <div class ="col-md">
                                                            <div class="form-floating">
                                                                <textarea class="form-control" id="message-text" name="eksekusi">{{ $dtab->sanksi }}</textarea>
                                                                <label for ="floatingInputGrid">Sanksi</label>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit"
                                                            class ="btn btn-primary">Simpan</button>
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
            {{ $absensi->links() }}
    </div>
    {{-- <div class="d-flex justify-content-right">
            {{!! $dt->links() !!}}
        </div> --}}
@else
    <p>Tidak ada Data</p>
    @endif

    <!- Modal Tambah Absen (Komen)->
    <div class="modal fade" id="tambah" tabindex="-1" data-bs-backdrop="static" data-bs keyboard="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class ="modal-title" id="exampleModalLabel">Tambah Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create-depot-form" action="{{ route('admin.absensi.store') }}" method="POST">
                        @csrf
                        <div class="row g-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="nis" id="nis" required>
                                        <option> -- pilih nis --</option>
                                        @foreach ($siswa as $dts)
                                            <option value="{{ $dts->nis }}" data-nama="{{ $dts->nama_siswa }}"
                                                data-kelas="{{ $dts->kelas }}" data-jurusan="{{ $dts->jurusan }}">
                                                {{ $dts->nis }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingInputGrid">NIS:</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <input type="text" class ="form-control" name="nm_siswa" id="nm_siswa"
                                        readonly>
                                    <label for ="floatingInputGrid">Nama Siswa</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="kls" id="kls" required>
                                        <option value="">-- pilih --</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    <label for ="floatingInputGrid">Kelas</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="jurusan" id="jurusan" required>
                                        <option value="">-- pilih --</option>
                                        <option value="DKV 1">DKV 1</option>
                                        <option value="DKV 2">DKV 2</option>
                                        <option value="TKJ">TKJ</option>
                                        <option value="RPL">RPL</option>
                                    </select>
                                    <label for ="floatingInputGrid">Jurusan</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <input type="datetime-local" class="form-control" id="kedatangan"
                                        name="kedatangan">
                                    <label for ="floatingInputGrid">Tanggal Kedatangan</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <select class="form-control" id= "keterangan" name="keterangan" required>
                                        <option>-- pilih --</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Tanpa Keterangan">Alpa</option>
                                    </select>
                                    <label for="floatingInputGrid">Keterangan</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="terlambat" id="terlambat" required>
                                        <option value="">-- pilih --</option>
                                        <option value="Terlambat">Terlambat</option>
                                        <option value="-">-</option>
                                    </select>
                                    <label for="floatingInputGrid">Terlambat</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <select class="form-control" name="poin" id="poin" required>
                                        <option value="">-- pilih --</option>
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                    </select>
                                    <label for="floatingInputGrid">Poin</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="row g-1">
                            <div class ="col-md">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message-text" name="sanksi"></textarea>
                                    <label for ="floatingInputGrid">Sanksi</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class ="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    {{-- js modal tambah nis otomatis data --}}
    <script>
        document.getElementById('nis').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];

            // Ambil data dari atribut data-*
            let nama_siswa = selectedOption.getAttribute('data-nama');
            let kelas = selectedOption.getAttribute('data-kelas');
            let jurusan = selectedOption.getAttribute('data-jurusan');

            // Masukkan ke dalam input teks
            document.getElementById('nm_siswa').value = nama_siswa ? nama_siswa : '';

            // Pilih opsi dropdown yang sesuai
            document.getElementById('kls').value = kelas ? kelas : '';
            document.getElementById('jurusan').value = jurusan ? jurusan : '';
        });
    </script>

    {{-- js modal poin terlambat kedatangan --}}
    <script>
        function hitungTerlambatDanPoin() {
            let kedatangan = document.getElementById('kedatangan').value;
            let keterangan = document.getElementById('keterangan').value;
            let terlambatField = document.getElementById('terlambat');
            let poinField = document.getElementById('poin');

            if (!kedatangan) return;

            let waktuKedatangan = new Date(kedatangan); // Ambil nilai kedatangan
            let batas = new Date(waktuKedatangan.toISOString().split('T')[0] + "T06:30"); // Batas jam 06:30
            let terlambat = "-"; // Default "-"
            let poin = 0; // Default poin 0

            // Cek apakah siswa terlambat
            if (waktuKedatangan > batas) {
                terlambat = "Terlambat";
            }
            if (keterangan === "Alpa") {
                poin = 3; //poin = 3 jika alpa
            } else if (keterangan === "Hadir" && terlambat === "Terlambat") {
                poin = 1; // poin = 1 jika hadir $ terlambat
            }
            terlambatField.value = terlambat;
            poinField.value = poin;
        }

        // untuk perubahan kedatangan
        document.getElementById('kedatangan').addEventListener('change', hitungTerlambatDanPoin);
        document.getElementById('keterangan').addEventListener('change', hitungTerlambatDanPoin);
    </script>

    {{-- js modal ubah --}}
    <script>
        document.addEventListener('change', function(event) {
            if (event.target.matches('[id^="ns"]')) {
                let selectedOption = event.target.options[event.target.selectedIndex];

                // ambil data dari atribut data
                let nama = selectedOption.getAttribute('data-nama');
                let kelas = selectedOption.getAttribute('data-kelas');
                let jurusan = selectedOption.getAttribute('data-jurusan');

                //Masukkan ke input
                let id = event.target.id.replace('ns', ''); // Get the unique ID
                document.getElementById('nm' + id).value = nama ? nama : '';
                document.getElementById('kls' + id).value = kelas ? kelas : '';
                document.getElementById('jur' + id).value = jurusan ? jurusan : '';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('change', function(event) {
                if (event.target.matches('#ubah_datang') || event.target.matches('#ubah_ket')) {
                    hitungTerlambatDanPoin();
                }
            });
        });

        function hitungTerlambatDanPoin() {
            let kedatangan = document.getElementById('ubah_datang').value;
            let keterangan = document.getElementById('ubah_ket').value;
            let terlambatField = document.getElementById('ubah_telat');
            let poinField = document.getElementById('ubah_poins');

            if (!kedatangan) return;

            let waktuKedatangan = new Date(kedatangan);
            let batas = new Date(waktuKedatangan);
            batas.setHours(6, 30, 0, 0);

            let terlambat = "-";
            let poin = 0;

            if (waktuKedatangan.getTime() > batas.getTime()) {
                terlambat = "Terlambat";
            }

            if (keterangan === "Alpa") {
                poin = 3;
            } else if (keterangan === "Hadir" && terlambat === "Terlambat") {
                poin = 1;
            }

            terlambatField.value = terlambat;
            poinField.value = poin;
        }
    </script>
    @include('layouts.footer')
</body>
</html> -->

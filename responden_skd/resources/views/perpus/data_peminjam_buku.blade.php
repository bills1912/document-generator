@extends('dashboard')

@section('container')
    <h1 class="mt-4">Data Peminjam Buku Perpustakaan BPS Kota Gunungsitoli</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus pr-1"></i>Tambah Peminjam Buku
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Peminjam Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/data_peminjam_buku') }}" method="post" id="tambahPeminjamBukuForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="namaPeminjam">Nama Peminjam</label>
                                <input type="text" class="form-control @error('nama_peminjam') 'is-invalid' @enderror"
                                    id="namaPeminjam" name="namaPeminjam" placeholder="Masukan Judul Buku" autofocus>
                                <div id="invalidNamaPeminjam" class="invalid-feedback">
                                    Nama peminjam wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="asalInstansi">Asal Instansi</label>
                                <input type="text" class="form-control @error('asal_instansi') 'is-invalid' @enderror"
                                    id="asalInstansi" name="asalInstansi" placeholder="Masukan Asal Instansi Peminjam">
                                <div id="invalidAsalInstansi" class="invalid-feedback">
                                    Asal instansi peminjam wajib diisi!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Judul Buku yang Dipinjam</label>
                                <select class="form-select" name="judulBukuDipinjam" id="judulBukuDipinjam"></select>
                            </div>
                            <div class="col-md-3">
                                <label for="waktuPeminjaman">Waktu Peminjaman</label>
                                <input type="datepicker" class="form-control" id="waktuPeminjaman" name="waktuPeminjaman"
                                    placeholder="Masukan Waktu Peminjaman Buku">
                                <div id="invalidWaktuPeminjaman" class="invalid-feedback">
                                    Waktu peminjaman data wajib diisi!
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="waktuPengembalian">Waktu Permintaan</label>
                                <input type="datepicker" class="form-control" id="waktuPengembalian"
                                    name="waktuPengembalian" placeholder="Masukan Waktu Pengembalian">
                                <div id="invalidWaktuPengembalian" class="invalid-feedback">
                                    Waktu pengembalian data wajib diisi!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk pr-2"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatable-peminjam-buku" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Asal Instansi</th>
                        <th>Judul Buku yang Dipinjam</th>
                        <th>Waktu Peminjaman</th>
                        <th>Waktu Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semua_peminjam as $peminjam)
                        <tr>
                            <td>{{ $peminjam->nama_peminjam }}</td>
                            <td>{{ $peminjam->asal_instansi }}</td>
                            <td>{{ $peminjam->judul_buku_dipinjam }}</td>
                            <td>{{ $peminjam->waktu_peminjaman }}</td>
                            <td>{{ $peminjam->waktu_pengembalian }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-warning btn-sm viewDataPeminjam"
                                    style="position:inline" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalView{{ $peminjam->id }}"><i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-sm editDataPeminjam"
                                    style="position:inline" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit{{ $peminjam->id }}"><i
                                        class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <a href="{{ url('/admin/data_peminjam_buku', $peminjam->id) }}"
                                    class="btn btn-outline-danger hapusDataPeminjamBuku btn-sm"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModalView{{ $peminjam->id }}" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Nama: {{ $peminjam->nama_peminjam }} <br>
                                            Asal Instansi: {{ $peminjam->asal_instansi }} <br>
                                            Judul Buku yang Dipinjam: {{ $peminjam->judul_buku_dipinjam }} <br>
                                            Waktu Peminjaman Buku: {{ $peminjam->waktu_peminjaman }} <br>
                                            Waktu Pengembalian Buku: {{ $peminjam->waktu_pengembalian }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            @foreach ($semua_peminjam as $peminjam)
                <div class="modal fade modal-edit-admin-peminjam" id="exampleModalEdit{{ $peminjam->id }}"
                    aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/update_data_peminjam/{{ $peminjam->id }}" method="post"
                                    id="editDataPeminjamBuku">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="namaPeminjam">Nama Peminjam</label>
                                            <input type="text"
                                                class="form-control @error('nama_peminjam') 'is-invalid' @enderror"
                                                id="namaPeminjam" name="namaPeminjam" placeholder="Masukan Judul Buku"
                                                value="{{ $peminjam->nama_peminjam }}" autofocus>
                                            <div id="invalidNamaPeminjam" class="invalid-feedback">
                                                Nama peminjam wajib diisi!
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="asalInstansi">Asal Instansi</label>
                                            <input type="text"
                                                class="form-control @error('asal_instansi') 'is-invalid' @enderror"
                                                id="asalInstansi" name="asalInstansi" placeholder="Masukan Judul Buku"
                                                value="{{ $peminjam->asal_instansi }}">
                                            <div id="invalidAsalInstansi" class="invalid-feedback">
                                                Asal instansi peminjam wajib diisi!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="editJudulBukuDipinjam">Judul Buku yang Dipinjam</label>
                                            <select class="form-select" name="editJudulBukuDipinjam"
                                                id="adminEditJudulBukuDipinjam"></select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="waktuPeminjaman">Waktu Peminjaman</label>
                                            <input type="datepicker" class="form-control" id="waktuPeminjaman"
                                                name="waktuPeminjaman" placeholder="Masukan Waktu Peminjaman Buku"
                                                value="{{ $peminjam->waktu_peminjaman }}">
                                            <div id="invalidWaktuPeminjaman" class="invalid-feedback">
                                                Waktu peminjaman data wajib diisi!
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="waktuPengembalian">Waktu Permintaan</label>
                                            <input type="datepicker" class="form-control" id="waktuPengembalian"
                                                name="waktuPengembalian" placeholder="Masukan Waktu Pengembalian"
                                                value="{{ $peminjam->waktu_pengembalian }}">
                                            <div id="invalidWaktuPengembalian" class="invalid-feedback">
                                                Waktu pengembalian data wajib diisi!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer mt-4">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa-solid fa-floppy-disk pr-2"></i>Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('perpus.guest.sistem_perpus')

@section('guest-container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman Buku yang Dilakukan</h1>
    <p class="mb-2 text-muted text-justify">Di bawah ini merupakan tabel data dari peminjaman buku yang dilakukan. Anda bisa
        melakukan penambahan,
        pengeditan, dan penghapusan data dari peminjaman yang anda lakukan.</p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus pr-1"></i>Tambah Peminjam Buku
    </button>

    <!-- Modal -->
    <div class="modal fade modal-edit" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Peminjam Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/guest/pinjam_buku') }}/tabel_buku_dipinjam" method="post"
                        id="tambahPeminjamBukuForm">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="asalInstansi">Asal Instansi</label>
                            <input type="text" class="form-control @error('asal_instansi') 'is-invalid' @enderror"
                                id="asalInstansi" name="asalInstansi" placeholder="Masukan Asal Instansi Peminjam"
                                value="{{ Auth::user()->affiliation }}"
                                {{ isset(Auth::user()->affiliation) ? 'readonly' : '' }}>
                            <div id="invalidAsalInstansi" class="invalid-feedback">
                                Asal instansi peminjam wajib diisi!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Judul Buku yang Dipinjam</label>
                            <select class="form-control" name="judulBukuDipinjam" id="userJudulBukuDipinjam"></select>
                        </div>
                        <div class="form-group">
                            <label for="waktuPeminjaman">Waktu Peminjaman</label>
                            <input type="text" class="form-control" id="waktuPeminjaman" name="waktuPeminjaman"
                                placeholder="Masukan Waktu Peminjaman Buku">
                            <div id="invalidWaktuPeminjaman" class="invalid-feedback">
                                Waktu peminjaman data wajib diisi!
                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save pr-2"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTablePeminjamanBuku" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul Buku yang Dipinjam</th>
                            <th>Waktu Peminjaman</th>
                            <th>Waktu Pengembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_peminjam as $peminjam_buku)
                            <tr>
                                <td>{{ $peminjam_buku->judul_buku_dipinjam }}</td>
                                <td>{{ $peminjam_buku->waktu_peminjaman }}</td>
                                <td>{{ $peminjam_buku->waktu_pengembalian }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm editDataPeminjam"
                                        style="position:inline" data-toggle="modal"
                                        data-target="#exampleModalEdit{{ $peminjam_buku->id }}"><i class="fas fa-edit"></i>
                                    </button>
                                    @can('is-admin')
                                        <a href="{{ url('/guest/pinjam_buku/tabel_buku_dipinjam', $peminjam_buku->id) }}"
                                            class="btn btn-outline-danger hapusDataPeminjamBuku btn-sm"><i
                                                class="far fa-trash-alt"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            <div class="modal fade modal-edit modal-edit-data-peminjam"
                                id="exampleModalEdit{{ $peminjam_buku->id }}" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/guest/pinjam_buku/update_data_peminjam/{{ $peminjam_buku->id }}"
                                                method="post" id="editDataPeminjamBuku">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="asalInstansi">Asal Instansi</label>
                                                        <input type="text"
                                                            class="form-control @error('asal_instansi') 'is-invalid' @enderror"
                                                            id="asalInstansi" name="asalInstansi"
                                                            placeholder="Masukan Judul Buku"
                                                            value="{{ $peminjam_buku->asal_instansi }}"
                                                            {{ isset(Auth::user()->affiliation) ? 'readonly' : '' }}>
                                                        <div id="invalidAsalInstansi" class="invalid-feedback">
                                                            Asal instansi peminjam wajib diisi!
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label>Judul Buku yang Dipinjam</label>
                                                        <select class="form-control" name="editJudulBukuDipinjam"
                                                            id="editJudulBukuDipinjam"></select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="waktuPeminjaman">Waktu Peminjaman</label>
                                                        <input type="text" class="form-control" id="waktuPeminjaman"
                                                            name="waktuPeminjaman"
                                                            placeholder="Masukan Waktu Peminjaman Buku"
                                                            value="{{ $peminjam_buku->waktu_peminjaman }}">
                                                        <div id="invalidWaktuPeminjaman" class="invalid-feedback">
                                                            Waktu peminjaman data wajib diisi!
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="waktuPengembalian">Waktu Permintaan</label>
                                                        <input type="text" class="form-control" id="waktuPengembalian_"
                                                            name="waktuPengembalian"
                                                            placeholder="Masukan Waktu Pengembalian"
                                                            value="{{ $peminjam_buku->waktu_pengembalian }}">
                                                        <div id="invalidWaktuPengembalian" class="invalid-feedback">
                                                            Waktu pengembalian data wajib diisi!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer mt-4">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fas fa-save pr-2"></i>Simpan</button>
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
        </div>
    </div>
@endsection

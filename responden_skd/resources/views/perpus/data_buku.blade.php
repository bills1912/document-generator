@extends('dashboard')

@section('container')
    <h1 class="mt-4">Data Buku Perpustakaan BPS Kota Gunungsitoli</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus pr-1"></i>Tambah Buku
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/data_buku_perpus') }}" method="post" id="tambahBukuForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="judulBuku">Judul Buku</label>
                                <input type="text" class="form-control @error('judul_buku') 'is-invalid' @enderror"
                                    id="judulBuku" name="judulBuku" placeholder="Masukan Judul Buku" autofocus>
                                <div id="invalidJudul" class="invalid-feedback">
                                    Judul buku wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="cakupanAnalisis">Cakupan Analisis Buku</label>
                                <select class="form-select" id="cakupanAnalisis" aria-label="Floating label select example"
                                    name="cakupanAnalisis">
                                    <option selected disabled value="" class="text-muted">-- Pilih Cakupan Analisis
                                        Buku --</option>
                                    <option value="Semua Sektor">Semua Sektor</option>
                                    <option value="Sosial dan Kependudukan">Sosial dan Kependudukan</option>
                                    <option value="Ekonomi dan Perdagangan">Ekonomi dan Perdagangan</option>
                                    <option value="Pertanian dan Pertambangan">Pertanian dan Pertambangan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <div id="invalidCakupanAnalisis" class="invalid-feedback">
                                    Cakupan analisis wajib diisi!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="levelPublikasi">Level Publikasi</label>
                                <select class="form-select" id="levelPublikasi" aria-label="Floating label select example"
                                    name="levelPublikasi">
                                    <option selected disabled value="" class="text-muted">-- Pilih Level Publikasi --
                                    </option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Provinsi">Provinsi</option>
                                    <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                    <option value="Kecamatan">Kecamatan</option>
                                    <option value="Desa">Desa</option>
                                </select>
                                <div id="invalidLevelPublikasi" class="invalid-feedback">
                                    Level publikasi wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="lokasiPenyimpanan">Lokasi Penyimpanan</label>
                                <select class="form-select" id="lokasiPenyimpanan"
                                    aria-label="Floating label select example" name="lokasiPenyimpanan">
                                    <option selected disabled value="" class="text-muted">-- Pilih Lokasi Penyimpanan
                                        Buku --</option>
                                    <option value="Dalam Lemari">Dalam Lemari</option>
                                    <option value="Luar Lemari">Luar Lemari</option>
                                </select>
                                <div id="invalidLokasiPenyimpanan" class="invalid-feedback">
                                    Lokasi penyimpanan wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="nomorRak">Nomor Rak</label>
                                <select class="form-select" id="nomorRak" aria-label="Floating label select example"
                                    name="nomorRak">
                                    <option selected disabled value="" class="text-muted">-- Pilih Nomor Rak Buku --
                                    </option>
                                    <option value="R1">R1</option>
                                    <option value="R2">R2</option>
                                    <option value="R3">R3</option>
                                    <option value="R4">R4</option>
                                    <option value="R5">R5</option>
                                    <option value="R6">R6</option>
                                    <option value="R7">R7</option>
                                    <option value="R8">R8</option>
                                </select>
                                <div id="invalidNomorRak" class="invalid-feedback">
                                    Lokasi penyimpanan wajib diisi!
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
            <table id="datatable-buku" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Cakupan Analisis</th>
                        <th>Level Publikasi</th>
                        <th>Lokasi Penyimpanan</th>
                        <th>Nomor Rak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semua_buku as $buku)
                        <tr>
                            <td>{{ $buku->judul_buku }}</td>
                            <td>
                                <small
                                    class="{{ $buku->cakupan_analisis == 'Semua Sektor'
                                        ? 'chips-all'
                                        : ($buku->cakupan_analisis == 'Sosial dan Kependudukan'
                                            ? 'chips-sosduk'
                                            : ($buku->cakupan_analisis == 'Ekonomi dan Perdagangan'
                                                ? 'chips-ekdagang'
                                                : ($buku->cakupan_analisis == 'Pertanian dan Pertambangan'
                                                    ? 'chips-tanitambang'
                                                    : 'chips-lainnya'))) }} }}">{{ $buku->cakupan_analisis }}
                                </small>
                            </td>
                            <td>
                                <small
                                    class="{{ $buku->level_publikasi == 'Nasional'
                                        ? 'chips-nasional'
                                        : ($buku->level_publikasi == 'Provinsi'
                                            ? 'chips-provinsi'
                                            : ($buku->level_publikasi == 'Kabupaten/Kota'
                                                ? 'chips-kako'
                                                : ($buku->level_publikasi == 'Kecamatan'
                                                    ? 'chips-kecamatan'
                                                    : 'chips-desa'))) }}">{{ $buku->level_publikasi }}
                                </small>
                            </td>
                            <td>
                                <small
                                    class="{{ $buku->lokasi_penyimpanan == 'Dalam Lemari' ? 'chips-dalam-lemari' : 'chips-luar-lemari' }}">{{ $buku->lokasi_penyimpanan }}
                                </small>
                            </td>
                            <td>
                                <small
                                    class="{{ $buku->nomor_rak == 'R1'
                                        ? 'chips-r1'
                                        : ($buku->nomor_rak == 'R2'
                                            ? 'chips-r2'
                                            : ($buku->nomor_rak == 'R3'
                                                ? 'chips-r3'
                                                : ($buku->nomor_rak == 'R4'
                                                    ? 'chips-r4'
                                                    : ($buku->nomor_rak == 'R5'
                                                        ? 'chips-r5'
                                                        : ($buku->nomor_rak == 'R6'
                                                            ? 'chips-r6'
                                                            : ($buku->nomor_rak == 'R7'
                                                                ? 'chips-r7'
                                                                : 'chips-r8')))))) }}">{{ $buku->nomor_rak }}
                                </small>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm editDataResponden"
                                    style="position:inline" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit{{ $buku->id }}"><i
                                        class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <a href="{{ url('/admin/data_buku_perpus', $buku->id) }}"
                                    class="btn btn-outline-danger hapusDataBuku btn-sm"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade modal-edit" id="exampleModalEdit{{ $buku->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/update_data_buku/{{ $buku->id }}" method="post"
                                            id="tambahBukuForm">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="judulBuku">Judul Buku</label>
                                                    <input type="text"
                                                        class="form-control @error('judul_buku') 'is-invalid' @enderror"
                                                        id="judulBuku" name="judulBuku" placeholder="Masukan Judul Buku"
                                                        value="{{ $buku->judul_buku }}" autofocus>
                                                    <div id="invalidJudul" class="invalid-feedback">
                                                        Judul buku wajib diisi!
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="cakupanAnalisis">Cakupan Analisis Buku</label>
                                                    <select class="form-select" id="cakupanAnalisis"
                                                        aria-label="Floating label select example" name="cakupanAnalisis">
                                                        <option selected disabled value="" class="text-muted">--
                                                            Pilih Cakupan Analisis
                                                            Buku --</option>
                                                        <option value="Semua Sektor"
                                                            {{ $buku->cakupan_analisis == 'Semua Sektor' ? 'selected' : '' }}>
                                                            Semua Sektor</option>
                                                        <option value="Sosial dan Kependudukan"
                                                            {{ $buku->cakupan_analisis == 'Sosial dan Kependudukan' ? 'selected' : '' }}>
                                                            Sosial dan Kependudukan</option>
                                                        <option value="Ekonomi dan Perdagangan"
                                                            {{ $buku->cakupan_analisis == 'Ekonomi dan Perdagangan' ? 'selected' : '' }}>
                                                            Ekonomi dan Perdagangan</option>
                                                        <option value="Pertanian dan Pertambangan"
                                                            {{ $buku->cakupan_analisis == 'Pertanian dan Pertambangan' ? 'selected' : '' }}>
                                                            Pertanian dan Pertambangan</option>
                                                        <option value="Lainnya"
                                                            {{ $buku->cakupan_analisis == 'Lainnya' ? 'selected' : '' }}>
                                                            Lainnya</option>
                                                    </select>
                                                    <div id="invalidCakupanAnalisis" class="invalid-feedback">
                                                        Cakupan analisis wajib diisi!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="levelPublikasi">Level Publikasi</label>
                                                    <select class="form-select" id="levelPublikasi"
                                                        aria-label="Floating label select example" name="levelPublikasi">
                                                        <option selected disabled value="" class="text-muted">--
                                                            Pilih Level Publikasi --
                                                        </option>
                                                        <option value="Nasional"
                                                            {{ $buku->level_publikasi == 'Nasional' ? 'selected' : '' }}>
                                                            Nasional</option>
                                                        <option value="Provinsi"
                                                            {{ $buku->level_publikasi == 'Provinsi' ? 'selected' : '' }}>
                                                            Provinsi</option>
                                                        <option value="Kabupaten/Kota"
                                                            {{ $buku->level_publikasi == 'Kabupaten/Kota' ? 'selected' : '' }}>
                                                            Kabupaten/Kota</option>
                                                        <option value="Kecamatan"
                                                            {{ $buku->level_publikasi == 'Kecamatan' ? 'selected' : '' }}>
                                                            Kecamatan</option>
                                                        <option value="Desa"
                                                            {{ $buku->level_publikasi == 'Desa' ? 'selected' : '' }}>Desa
                                                        </option>
                                                    </select>
                                                    <div id="invalidLevelPublikasi" class="invalid-feedback">
                                                        Level publikasi wajib diisi!
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="lokasiPenyimpanan">Lokasi Penyimpanan</label>
                                                    <select class="form-select" id="lokasiPenyimpanan"
                                                        aria-label="Floating label select example"
                                                        name="lokasiPenyimpanan">
                                                        <option selected disabled value="" class="text-muted">--
                                                            Pilih Lokasi Penyimpanan
                                                            Buku --</option>
                                                        <option value="Dalam Lemari"
                                                            {{ $buku->lokasi_penyimpanan == 'Dalam Lemari' ? 'selected' : '' }}>
                                                            Dalam Lemari</option>
                                                        <option value="Luar Lemari"
                                                            {{ $buku->lokasi_penyimpanan == 'Luar Lemari' ? 'selected' : '' }}>
                                                            Luar Lemari</option>
                                                    </select>
                                                    <div id="invalidLokasiPenyimpanan" class="invalid-feedback">
                                                        Lokasi penyimpanan wajib diisi!
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="nomorRak">Nomor Rak</label>
                                                    <select class="form-select" id="nomorRak"
                                                        aria-label="Floating label select example" name="nomorRak">
                                                        <option selected disabled value="" class="text-muted">--
                                                            Pilih Nomor Rak Buku --
                                                        </option>
                                                        <option value="R1"
                                                            {{ $buku->nomor_rak == 'R1' ? 'selected' : '' }}>R1</option>
                                                        <option value="R2"
                                                            {{ $buku->nomor_rak == 'R2' ? 'selected' : '' }}>R2</option>
                                                        <option value="R3"
                                                            {{ $buku->nomor_rak == 'R3' ? 'selected' : '' }}>R3</option>
                                                        <option value="R4"
                                                            {{ $buku->nomor_rak == 'R4' ? 'selected' : '' }}>R4</option>
                                                        <option value="R5"
                                                            {{ $buku->nomor_rak == 'R5' ? 'selected' : '' }}>R5</option>
                                                        <option value="R6"
                                                            {{ $buku->nomor_rak == 'R6' ? 'selected' : '' }}>R6</option>
                                                        <option value="R7"
                                                            {{ $buku->nomor_rak == 'R7' ? 'selected' : '' }}>R7</option>
                                                        <option value="R8"
                                                            {{ $buku->nomor_rak == 'R8' ? 'selected' : '' }}>R8</option>
                                                    </select>
                                                    <div id="invalidNomorRak" class="invalid-feedback">
                                                        Lokasi penyimpanan wajib diisi!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer mt-4">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa-solid fa-floppy-disk pr-2"></i>Perbaharui</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>Status Pelayanan</th>
                        <th>Nomor Telepon</th>
                        <th>Waktu Permintaan</th>
                        <th>Data yang Diminta</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot> --}}
            </table>
        </div>
    </div>
@endsection

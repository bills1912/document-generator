@extends('perpus.guest.sistem_perpus')

@section('guest-container')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Dokumen yang Di-<i>generate</i></h1>
    <p class="mb-2 text-muted text-justify">Di bawah ini merupakan tabel data dari dokumen yang dihasilkan. Anda bisa
        melakukan penambahan,
        pengeditan, dan penghapusan data dari dokumen yang anda <i>generate</i>.</p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahSuratTugas">
        <i class="fas fa-plus pr-1"></i>Tambah Dokumen
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalTambahSuratTugas" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Surat Tugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/guest/generate_dokumen') }}/surat_tugas" method="post"
                        id="tambahSuratTugasForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="namaFileSurat">Nama File</label>
                                <input type="text" class="form-control @error('nama_file') 'is-invalid' @enderror"
                                    id="namaFileSurat" name="namaFileSurat" placeholder="Masukkan Nama File">
                                <div id="invalidAsalInstansi" class="invalid-feedback">
                                    Asal instansi peminjam wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="nomorSurat">Nomor Surat</label>
                                <input type="text" class="form-control @error('nomor_surat') 'is-invalid' @enderror"
                                    id="nomorSurat" name="nomorSurat" placeholder="Masukkan Nomor Surat">
                                <div id="invalidAsalInstansi" class="invalid-feedback">
                                    Asal instansi peminjam wajib diisi!
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="jabatan">Jabatan Pembuat Surat</label>
                                <input type="text" class="form-control @error('jabatan') 'is-invalid' @enderror"
                                    id="jabatan" name="jabatan" placeholder="Masukkan Jabatan">
                                <div id="invalidAsalInstansi" class="invalid-feedback">
                                    Asal instansi peminjam wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="kegiatan">Kegiatan yang Dilakukan</label>
                                <input type="text" class="form-control" id="kegiatan" name="kegiatan"
                                    placeholder="Masukkan Jabatan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="mulaiKegiatan">Tanggal Kegiatan Dimulai</label>
                                    <input type="datepicker" class="form-control" id="mulaiKegiatan" name="mulaiKegiatan"
                                        placeholder="Masukan Tanggal Dimulai">
                                </div>
                            </div>
                            <div class="col">
                                <label for="akhirKegiatan">Tanggal Kegiatan Berakhir</label>
                                <input type="text" class="form-control" id="akhirKegiatan" name="akhirKegiatan"
                                    placeholder="Masukan Tanggal Berakhir">
                            </div>
                            <div class="col">
                                <label for="tanggalTTD">Tanggal Tanda Tangan</label>
                                <input type="text" class="form-control" id="tanggalTTD" name="tanggalTTD"
                                    placeholder="Masukan Waktu Pengembalian">
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
                <table class="table table-bordered" id="dataTableSuratTugas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Jabatan Pembuat</th>
                            <th>Kegiatan</th>
                            <th>Timeline</th>
                            <th>Tanggal TTD</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_surat_tugas as $surat_tugas)
                            <tr>
                                <td>{{ $surat_tugas->nomor_surat }}</td>
                                <td>{{ $surat_tugas->jabatan }}</td>
                                <td>{{ $surat_tugas->kegiatan }}</td>
                                <td>{{ $surat_tugas->mulai_kegiatan . ' - ' . $surat_tugas->akhir_kegiatan }}</td>
                                <td>{{ $surat_tugas->tanggal_ttd }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm editDataPeminjam"
                                        style="position:inline" data-toggle="modal"
                                        data-target="#exampleModalEdit{{ $surat_tugas->id }}"><i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ url('/guest/generate_dokumen/surat_tugas', $surat_tugas->id) }}"
                                        class="btn btn-outline-danger hapusDataSuratTugas btn-sm"><i
                                            class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <div class="modal fade modal-edit modal-edit-data-peminjam"
                                id="exampleModalEdit{{ $surat_tugas->id }}" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button class="close" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/guest/generate_dokumen') }}/surat_tugas/{{ $surat_tugas->id }}" method="post"
                                                id="editSuratTugasForm">
                                                @csrf
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="namaFileSurat">Nama File</label>
                                                        <input type="text"
                                                            class="form-control @error('nama_file') 'is-invalid' @enderror"
                                                            id="namaFileSurat" name="namaFileSurat"
                                                            placeholder="Masukkan Nama File">
                                                        <div id="invalidAsalInstansi" class="invalid-feedback">
                                                            Asal instansi peminjam wajib diisi!
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="nomorSurat">Nomor Surat</label>
                                                        <input type="text"
                                                            class="form-control @error('nomor_surat') 'is-invalid' @enderror"
                                                            id="nomorSurat" name="nomorSurat"
                                                            placeholder="Masukkan Nomor Surat" value="{{ $surat_tugas->nomor_surat }}">
                                                        <div id="invalidAsalInstansi" class="invalid-feedback">
                                                            Asal instansi peminjam wajib diisi!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="jabatan">Jabatan Pembuat Surat</label>
                                                        <input type="text"
                                                            class="form-control @error('jabatan') 'is-invalid' @enderror"
                                                            id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" value="{{ $surat_tugas->jabatan }}">
                                                        <div id="invalidAsalInstansi" class="invalid-feedback">
                                                            Asal instansi peminjam wajib diisi!
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="kegiatan">Kegiatan yang Dilakukan</label>
                                                        <input type="text" class="form-control" id="kegiatan"
                                                            name="kegiatan" placeholder="Masukkan Jabatan" value="{{ $surat_tugas->kegiatan }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="mulaiKegiatan">Tanggal Kegiatan Dimulai</label>
                                                            <input type="datepicker" class="form-control"
                                                                id="mulaiKegiatan" name="mulaiKegiatan"
                                                                placeholder="Masukan Tanggal Dimulai" value="{{ $surat_tugas->mulai_kegiatan }}">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="akhirKegiatan">Tanggal Kegiatan Berakhir</label>
                                                        <input type="text" class="form-control" id="akhirKegiatan"
                                                            name="akhirKegiatan" placeholder="Masukan Tanggal Berakhir" value="{{ $surat_tugas->akhir_kegiatan }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="tanggalTTD">Tanggal Tanda Tangan</label>
                                                        <input type="text" class="form-control" id="tanggalTTD"
                                                            name="tanggalTTD" placeholder="Masukan Waktu Pengembalian" value="{{ $surat_tugas->tanggal_ttd }}">
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

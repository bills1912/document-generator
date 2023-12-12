@extends('dashboard')

@section('container')
    <h1 class="mt-4">Data Responden</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-plus pr-1"></i>Tambah Data Responden
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/data_responden') }}" method="post" id="tambahRespondenForm">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name">Nama Responden</label>
                                <input type="text" class="form-control @error('name') 'is-invalid' @enderror"
                                    id="name" name="name" placeholder="Masukan Nama Peminta Data" autofocus>
                                <div id="invalidName" class="invalid-feedback">
                                    Nama responden wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="affiliation">Asal Instansi</label>
                                <input type="text" class="form-control" id="affiliation" name="affiliation"
                                    placeholder="Masukan Asal Instansi">
                                <div id="invalidAffiliation" class="invalid-feedback">
                                    Asal instansi wajib diisi!
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="status">Status Pelayanan</label>
                                <select class="form-select" id="status" aria-label="Floating label select example"
                                    name="status">
                                    <option selected disabled value="" class="text-muted">-- Pilih Status
                                        Pelayanan --</option>
                                    <option value="Belum Dilayani">Belum Dilayani</option>
                                    <option value="Sudah Dilayani">Sudah Dilayani</option>
                                    <option value="Menunggu">Menunggu</option>
                                </select>
                                <div id="invalidStatus" class="invalid-feedback">
                                    Status pelayanan wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <label for="dataRequestTime">Waktu Permintaan</label>
                                <input type="text" class="form-control" id="dataRequestTime" name="dataRequestTime"
                                    placeholder="Masukan Waktu Permintaan Data">
                                <div id="invalidDataRequestTime" class="invalid-feedback">
                                    Waktu permintaan data wajib diisi!
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="98232" value="+62">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="typeDataRequest">Data yang Diminta</label>
                            <textarea class="form-control" placeholder="Tuliskan Data yang Diminta" id="typeDataRequest" name="typeDataRequest"></textarea>
                            <div id="invalidTypeDataRequest" class="invalid-feedback">
                                Data yang diminta wajib diisi!
                            </div>
                        </div>
                        <div class="modal-footer">
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
            <table id="datatable-responden" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>Status Pelayanan</th>
                        <th>Nomor Telepon</th>
                        <th>Waktu Permintaan</th>
                        <th>Data yang Diminta</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_responden as $responden)
                        <tr>
                            <td>{{ $responden->name }}</td>
                            <td>{{ $responden->affiliation }}</td>
                            <td><small
                                    class="{{ $responden->service_status == 'Belum Dilayani' ? 'chips-not-done' : ($responden->service_status == 'Sudah Dilayani' ? 'chips-done' : 'chips-wait') }}">{{ $responden->service_status }}</small>
                            </td>
                            <td>{{ $responden->phone_number }}</td>
                            <td>{{ $responden->data_request_time }}</td>
                            <td>{{ $responden->type_data_request }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm editDataResponden"
                                    style="position:inline" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit{{ $responden->id }}"><i
                                        class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <a href="{{ url('/admin/data_responden', $responden->id) }}"
                                    class="btn btn-outline-danger hapusResponden btn-sm"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade modal-edit admin-edit-responden" id="exampleModalEdit{{ $responden->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/update_responden/{{ $responden->id }}" method="post"
                                            id="editRespondenForm">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="name">Nama</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Masukan Nama Peminta Data"
                                                        value="{{ $responden->name }}">
                                                    <div id="invalidName" class="invalid-feedback">
                                                        Nama responden wajib diisi!
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="affiliation">Asal Instansi</label>
                                                    <input type="text" class="form-control" id="affiliation"
                                                        name="affiliation" placeholder="Masukan Asal Instansi"
                                                        value="{{ $responden->affiliation }}">
                                                    <div id="invalidAffiliation" class="invalid-feedback">
                                                        Asal instansi wajib diisi!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="status">Status Pelayanan</label>
                                                    <select class="form-select" id="status"
                                                        aria-label="Floating label select example" name="status"
                                                        value="{{ $responden->service_status }}">
                                                        <option selected hidden disabled
                                                            {{ isset($responden->service_status) ? '' : 'selected' }}
                                                            class="text-muted">-- Pilih Status
                                                            Pelayanan --</option>
                                                        <option value="Belum Dilayani"
                                                            {{ $responden->service_status == 'Belum Dilayani' ? 'selected' : '' }}>
                                                            Belum Dilayani</option>
                                                        <option value="Sudah Dilayani"
                                                            {{ $responden->service_status == 'Sudah Dilayani' ? 'selected' : '' }}>
                                                            Sudah Dilayani</option>
                                                        <option value="Menunggu"
                                                            {{ $responden->service_status == 'Menunggu' ? 'selected' : '' }}>
                                                            Menunggu</option>
                                                    </select>
                                                    <div id="invalidStatus" class="invalid-feedback">
                                                        Status pelayanan wajib diisi!
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="dataRequestTime">Waktu Permintaan Data</label>
                                                    <input type="datepicker" class="form-control" id="dataRequestTime"
                                                        name="dataRequestTime" placeholder="Masukan Waktu Permintaan Data"
                                                        value="{{ $responden->data_request_time }}">
                                                    <div id="invalidDataRequestTime" class="invalid-feedback">
                                                        Waktu permintaan data wajib diisi!
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="tel" class="form-control" id="phone"
                                                            name="phone" placeholder="98232"
                                                            value="{{ $responden->phone_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="typeDataRequest">Data yang Diminta</label>
                                                <input type="hidden" name="typeDataRequest">
                                                <textarea class="form-control" placeholder="Tuliskan Data yang Diminta" id="typeDataRequest" name="typeDataRequest">{{ $responden->type_data_request }}</textarea>
                                                <div id="invalidTypeDataRequest" class="invalid-feedback">
                                                    Data yang diminta wajib diisi!
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa-solid fa-floppy-disk pr-2"></i>Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Asal Instansi</th>
                        <th>Status Pelayanan</th>
                        <th>Nomor Telepon</th>
                        <th>Waktu Permintaan</th>
                        <th>Data yang Diminta</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@extends('responden.guest.intermediary')

@section('guest_permintaan_data')
    <table id="guest-permintaan-data" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Asal Instansi</th>
                <th>Status Pelayanan</th>
                <th>Nomor Telepon</th>
                <th>Waktu Permintaan</th>
                <th>Data yang Diminta</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftar_data_diminta as $daftar)
                <tr>
                    <td>{{ $daftar->affiliation }}</td>
                    <td><small
                            class="{{ $daftar->service_status == 'Belum Dilayani' ? 'chips-not-done' : ($daftar->service_status == 'Sudah Dilayani' ? 'chips-done' : 'chips-wait') }}">{{ $daftar->service_status }}</small>
                    </td>
                    <td>{{ $daftar->phone_number }}</td>
                    <td>{{ $daftar->data_request_time }}</td>
                    <td>{{ $daftar->type_data_request }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm editDataResponden" style="position:inline"
                            data-bs-toggle="modal" data-bs-target="#exampleModalEdit{{ $daftar->id }}"><i
                                class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <a href="{{ url('/guest/permintaan_data', $daftar->id) }}"
                            class="btn btn-outline-danger hapusResponden btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Asal Instansi</th>
                <th>Status Pelayanan</th>
                <th>Nomor Telepon</th>
                <th>Waktu Permintaan</th>
                <th>Data yang Diminta</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
    @foreach ($daftar_data_diminta as $daftar)
        <div class="modal fade guest-modal-edit" id="exampleModalEdit{{ $daftar->id }}"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/guest/permintaan_data/{{ $daftar->id }}" method="post" id="editRespondenForm">
                            @csrf
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukan Nama Peminta Data" value="{{ $daftar->name }}" {{ isset($daftar->name) ? 'readonly' : '' }}>
                                    <div id="invalidName" class="invalid-feedback">
                                        Nama responden wajib diisi!
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="affiliation">Asal Instansi</label>
                                    <input type="text" class="form-control" id="affiliation" name="affiliation"
                                        placeholder="Masukan Asal Instansi" value="{{ $daftar->affiliation }}" {{ isset($daftar->affiliation) ? 'readonly' : '' }}>
                                    <div id="invalidAffiliation" class="invalid-feedback">
                                        Asal instansi wajib diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="status">Status Pelayanan</label>
                                    <select class="form-select" id="status" aria-label="Floating label select example"
                                        name="status" value="{{ $daftar->service_status }}">
                                        <option selected hidden disabled
                                            {{ isset($daftar->service_status) ? '' : 'selected' }} class="text-muted">--
                                            Pilih Status
                                            Pelayanan --</option>
                                        <option value="Belum Dilayani"
                                            {{ $daftar->service_status == 'Belum Dilayani' ? 'selected' : '' }}>
                                            Belum Dilayani</option>
                                        <option value="Sudah Dilayani"
                                            {{ $daftar->service_status == 'Sudah Dilayani' ? 'selected' : '' }}>
                                            Sudah Dilayani</option>
                                        <option value="Menunggu"
                                            {{ $daftar->service_status == 'Menunggu' ? 'selected' : '' }}>
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
                                        value="{{ $daftar->data_request_time }}">
                                    <div id="invalidDataRequestTime" class="invalid-feedback">
                                        Waktu permintaan data wajib diisi!
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="98232" value="{{ $daftar->phone_number }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="typeDataRequest">Data yang Diminta</label>
                                <input type="hidden" name="typeDataRequest">
                                <textarea class="form-control" placeholder="Tuliskan Data yang Diminta" id="typeDataRequest" name="typeDataRequest">{{ $daftar->type_data_request }}</textarea>
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
@endsection

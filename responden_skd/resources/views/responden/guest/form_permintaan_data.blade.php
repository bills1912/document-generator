@extends('responden.guest.intermediary')

@section('guest_permintaan_data')
    <form action="{{ url('/guest/permintaan_data/form_permintaan_data') }}" method="post" id="tambahRespondenForm">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="name">Nama Responden</label>
                <input type="text" class="form-control @error('name') 'is-invalid' @enderror" id="name" name="name"
                    placeholder="Masukan Nama Peminta Data" value="{{ Auth::user()->name }}" readonly>
                <div id="invalidName" class="invalid-feedback">
                    Nama responden wajib diisi!
                </div>
            </div>
            <div class="col">
                <label for="affiliation">Asal Instansi</label>
                <input type="text" class="form-control" id="affiliation" name="affiliation"
                    placeholder="Masukan Asal Instansi" value="{{ Auth::user()->affiliation }}" {{ isset(Auth::user()->affiliation) ? 'readonly' : '' }}>
                <div id="invalidAffiliation" class="invalid-feedback">
                    Asal instansi wajib diisi!
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="status">Status Pelayanan</label>
                <select class="form-select" id="status" aria-label="Floating label select example" name="status">
                    <option selected disabled value="" class="text-muted">--
                        Pilih Status
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
                    <input type="tel" class="form-control" id="guestPhone" name="guestPhone" placeholder="98232"
                        value="+62" width="100%">
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
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk pr-2"></i>Simpan</button>
        </div>
    </form>
@endsection

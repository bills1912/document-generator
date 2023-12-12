<?php

namespace App\Http\Controllers;

use App\Models\DaftarMitra;
use App\Models\DataBukuPerpus1278Model;
use App\Models\DataPeminjamBuku1278;
use App\Models\RespondenSKDModel;
use App\Models\SuratTugasBPS1278Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\TemplateProcessor;
use RealRashid\SweetAlert\Facades\Alert;

class SimaneredaController extends Controller
{
    public function index()
    {
        return view("landing_page.home");
    }

    public function projects()
    {
        return view("landing_page.projects");
    }

    public function sistemPerpus()
    {
        return view("perpus.guest.guest_home");
    }

    public function generateSuratTugas()
    {
        $dataSuratTugas = SuratTugasBPS1278Model::all();
        return view("document_generator.surat_tugas", [
            'data_surat_tugas' => $dataSuratTugas
        ]);
    }

    public function guestPermintaanData()
    {
        $pemintaData = RespondenSKDModel::where('applicant_token', Auth::user()->user_token)->get();
        return view("responden.guest.guest_tabel_permintaan_data", [
            'daftar_data_diminta' => $pemintaData
        ]);
    }

    public function formPermintaanData()
    {
        return view("responden.guest.form_permintaan_data");
    }

    public function pilihJudulBuku()
    {
        $data = DataBukuPerpus1278Model::where('judul_buku', 'LIKE', '%' . request('q') . '%')->paginate(10);
        return response()->json($data);
    }

    public function pilihJudulBukuBaru()
    {
        $data = DataBukuPerpus1278Model::where('judul_buku', 'LIKE', '%' . request('q') . '%')->paginate(10);
        return response()->json($data);
    }

    public function tabelBukuDipinjam()
    {
        $dataPeminjam = DataPeminjamBuku1278::where('token_pengguna', Auth::user()->user_token)->get();
        return view("perpus.guest.guest_table", [
            "data_peminjam" => $dataPeminjam
        ]);
    }

    /* -- CRUD Section -- */

    public function tambahDataPeminjamBuku(Request $request)
    {
        DataPeminjamBuku1278::create([
            'nama_peminjam' => Auth::user()->name,
            'asal_instansi' => Auth::user()->affiliation,
            'judul_buku_dipinjam' => $request->input('judulBukuDipinjam'),
            'waktu_peminjaman' => $request->input('waktuPeminjaman'),
            'token_pengguna' => Auth::user()->user_token,
        ]);
        Alert::success('Berhasil', 'Data Peminjam Buku Berhasil Ditambahkan');
        return redirect()->to('/guest/pinjam_buku/tabel_buku_dipinjam');
    }

    public function editDataPeminjamBuku(Request $request, $id)
    {
        DataPeminjamBuku1278::where('id', $id)
            ->update([
                'asal_instansi' => Auth::user()->affiliation,
                'judul_buku_dipinjam' => $request->input('editJudulBukuDipinjam'),
                'waktu_peminjaman' => $request->input('waktuPeminjaman'),
                'waktu_pengembalian' => $request->input('waktuPengembalian')
            ]);
        Alert::success('Berhasil', 'Data Peminjam Buku Berhasil Diperbaharui');
        return redirect('/guest/pinjam_buku/tabel_buku_dipinjam');
    }

    public function hapusDataPeminjamBuku($id)
    {
        DataPeminjamBuku1278::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Data Peminjam Buku Berhasil Dihapus');
        return redirect('/guest/pinjam_buku/tabel_buku_dipinjam');
    }

    public function tambahDataResponden(Request $request)
    {
        RespondenSKDModel::create([
            'name' => Auth::user()->name,
            'affiliation' => strtoupper($request->input('affiliation')),
            'service_status' => ucwords($request->input('status')),
            'phone_number' => $request->input('guestPhone'),
            'data_request_time' => $request->input('dataRequestTime'),
            'type_data_request' => ucfirst($request->input('typeDataRequest')),
            'applicant_token' => Auth::user()->user_token,
        ]);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->to('/guest/permintaan_data');
    }

    public function hapusDataResponden($id)
    {
        RespondenSKDModel::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/guest/permintaan_data');
    }

    public function editDataResponden(Request $request, $id)
    {
        RespondenSKDModel::where('id', $id)
            ->update([
                'name' => Auth::user()->name,
                'affiliation' => strtoupper($request->input('affiliation')),
                'service_status' => ucwords($request->input('status')),
                'phone_number' => $request->input('phone'),
                'data_request_time' => $request->input('dataRequestTime'),
                'type_data_request' => ucfirst($request->input('typeDataRequest')),
            ]);
        Alert::success('Berhasil', 'Data Berhasil Diperbaharui');
        return redirect('/guest/permintaan_data');
    }

    public function tambahSuratTugas(Request $request)
    {
        SuratTugasBPS1278Model::create([
            'nomor_surat' => ucwords($request->input('nomorSurat')),
            'jabatan' => ucwords($request->input('jabatan')),
            'kegiatan' => ucwords($request->input('kegiatan')),
            'mulai_kegiatan' => $request->input('mulaiKegiatan'),
            'akhir_kegiatan' => $request->input('akhirKegiatan'),
            'tanggal_ttd' => $request->input('tanggalTTD'),
        ]);

        $templateSuratTugas = new TemplateProcessor('assets/doc_template/ST PCL Seruti TW IV.docx');
        $templateSuratTugas->setValues([
            'nomor_surat' => ucwords($request->input('nomorSurat')),
            'jabatan' => ucwords($request->input('jabatan')),
            'kegiatan' => ucwords($request->input('kegiatan')),
            'timeline' => $request->input('mulaiKegiatan') . ' - ' . $request->input('akhirKegiatan'),
            'tanggal_ttd' => $request->input('tanggalTTD'),
        ]);

        $dataPCL = DaftarMitra::select('nama_mitra')->take(10)->get();
        $arrPCL = [];
        foreach ($dataPCL as $data => $value) {
            $arrPCL[] = ['mitra_pcl' => $value->nama_mitra];
        }

        $templateSuratTugas->cloneRowAndSetValues('mitra_pcl', $arrPCL);

        $savePath = strtoupper($request->input('namaFileSurat')) . '.docx';
        $templateSuratTugas->saveAs($savePath);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . strtoupper($request->input('namaFileSurat')) . '.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile($savePath);

        Alert::success('Berhasil', 'File Surat Berhasil Ditambahkan');
        return redirect()->to('/guest/generate_dokumen/surat_tugas');
    }

    public function editSuratTugas(Request $request, $id)
    {
        SuratTugasBPS1278Model::where('id', $id)
            ->update([
                'nomor_surat' => ucwords($request->input('nomorSurat')),
                'jabatan' => ucwords($request->input('jabatan')),
                'kegiatan' => ucwords($request->input('kegiatan')),
                'mulai_kegiatan' => $request->input('mulaiKegiatan'),
                'akhir_kegiatan' => $request->input('akhirKegiatan'),
                'tanggal_ttd' => $request->input('tanggalTTD'),
            ]);

        $templateSuratTugas = new TemplateProcessor('assets/doc_template/ST PCL Seruti TW IV.docx');
        $templateSuratTugas->setValues([
            'nomor_surat' => ucwords($request->input('nomorSurat')),
            'jabatan' => ucwords($request->input('jabatan')),
            'kegiatan' => ucwords($request->input('kegiatan')),
            'timeline' => $request->input('mulaiKegiatan') . ' - ' . $request->input('akhirKegiatan'),
            'tanggal_ttd' => $request->input('tanggalTTD'),
        ]);

        $dataPCL = DaftarMitra::select('nama_mitra')->take(10)->get();
        $arrPCL = [];
        foreach ($dataPCL as $data => $value) {
            $arrPCL[] = ['mitra_pcl' => $value->nama_mitra];
        }

        $templateSuratTugas->cloneRowAndSetValues('mitra_pcl', $arrPCL);

        $savePath = strtoupper($request->input('namaFileSurat')) . '.docx';
        $templateSuratTugas->saveAs($savePath);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . strtoupper($request->input('namaFileSurat')) . '.docx');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

        readfile($savePath);

        Alert::success('Berhasil', 'Data Surat Berhasil Diperbaharui');
        return redirect()->to('/guest/generate_dokumen/surat_tugas');
    }

    public function hapusDataSuratTugas($id)
    {
        SuratTugasBPS1278Model::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/guest/generate_dokumen/surat_tugas');
    }
}

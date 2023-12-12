<?php

namespace App\Http\Controllers;

use App\Models\DataBukuPerpus1278Model;
use App\Models\DataPeminjamBuku1278;
use App\Models\RespondenSKDModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PerpusBPSGusit extends Controller
{
    public function dataBukuPerpus()
    {
        $dataBuku = DataBukuPerpus1278Model::all();
        return view("perpus.data_buku", [
            "semua_buku" => collect($dataBuku)
        ]);
    }

    public function dataPeminjamBuku()
    {
        $dataPeminjam = DataPeminjamBuku1278::all();
        return view("perpus.data_peminjam_buku", [
            "semua_peminjam" => collect($dataPeminjam)
        ]);
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

    public function tambahDataBuku(Request $request)
    {
        DataBukuPerpus1278Model::create([
            'judul_buku' => ucwords($request->input('judulBuku')),
            'cakupan_analisis' => $request->input('cakupanAnalisis'),
            'level_publikasi' => $request->input('levelPublikasi'),
            'lokasi_penyimpanan' => $request->input('lokasiPenyimpanan'),
            'nomor_rak' => $request->input('nomorRak')
        ]);
        Alert::success('Berhasil', 'Data Buku Berhasil Ditambahkan');
        return redirect()->to('/admin/data_buku_perpus');
    }

    public function tambahDataPeminjamBuku(Request $request)
    {
        DataPeminjamBuku1278::create([
            'nama_peminjam' => ucwords($request->input('namaPeminjam')),
            'asal_instansi' => strtoupper($request->input('asalInstansi')),
            'judul_buku_dipinjam' => $request->input('judulBukuDipinjam'),
            'waktu_peminjaman' => $request->input('waktuPeminjaman'),
            'waktu_pengembalian' => $request->input('waktuPengembalian')
        ]);
        Alert::success('Berhasil', 'Data Peminjam Buku Berhasil Ditambahkan');
        return redirect()->to('/admin/data_peminjam_buku');
    }

    public function editDataBuku(Request $request, $id)
    {
        DataBukuPerpus1278Model::where('id', $id)
            ->update([
                'judul_buku' => ucwords($request->input('judulBuku')),
                'cakupan_analisis' => $request->input('cakupanAnalisis'),
                'level_publikasi' => $request->input('levelPublikasi'),
                'lokasi_penyimpanan' => $request->input('lokasiPenyimpanan'),
                'nomor_rak' => $request->input('nomorRak')
            ]);
        Alert::success('Berhasil', 'Data Buku Berhasil Diperbaharui');
        return redirect('/admin/data_buku_perpus');
    }

    public function editDataPeminjamBuku(Request $request, $id)
    {
        DataPeminjamBuku1278::where('id', $id)
            ->update([
                'nama_peminjam' => ucwords($request->input('namaPeminjam')),
                'asal_instansi' => strtoupper($request->input('asalInstansi')),
                'judul_buku_dipinjam' => $request->input('editJudulBukuDipinjam'),
                'waktu_peminjaman' => $request->input('waktuPeminjaman'),
                'waktu_pengembalian' => $request->input('waktuPengembalian')
            ]);
        Alert::success('Berhasil', 'Data Peminjam Buku Berhasil Diperbaharui');
        return redirect('/admin/data_peminjam_buku');
    }

    public function hapusDataBuku($id)
    {
        DataBukuPerpus1278Model::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Data Buku Berhasil Dihapus');
        return redirect('/admin/data_buku_perpus');
    }

    public function hapusDataPeminjamBuku($id)
    {
        DataPeminjamBuku1278::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Data Peminjam Buku Berhasil Dihapus');
        return redirect('/admin/data_peminjam_buku');
    }
}

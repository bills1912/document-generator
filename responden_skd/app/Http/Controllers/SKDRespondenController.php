<?php

namespace App\Http\Controllers;

use App\Models\RespondenSKDModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SKDRespondenController extends Controller
{
    public function admin()
    {
        return view("responden.report");
    }

    public function dataResponden()
    {
        $responden = RespondenSKDModel::all();
        return view("responden.data", [
            "data_responden" => $responden
        ]);
    }

    public function tambahDataResponden(Request $request)
    {
        RespondenSKDModel::create([
            'name' => ucwords($request->input('name')),
            'affiliation' => strtoupper($request->input('affiliation')),
            'service_status' => ucwords($request->input('status')),
            'phone_number' => $request->input('phone'),
            'data_request_time' => $request->input('dataRequestTime'),
            'type_data_request' => ucfirst($request->input('typeDataRequest')),
        ]);
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->to('/admin/data_responden');
    }

    public function hapusDataResponden($id)
    {
        RespondenSKDModel::findOrFail($id)->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect('/admin/data_responden');
    }

    public function editDataResponden(Request $request, $id)
    {
        RespondenSKDModel::where('id', $id)
            ->update([
                'name' => ucwords($request->input('name')),
                'affiliation' => strtoupper($request->input('affiliation')),
                'service_status' => ucwords($request->input('status')),
                'phone_number' => $request->input('phone'),
                'data_request_time' => $request->input('dataRequestTime'),
                'type_data_request' => ucfirst($request->input('typeDataRequest')),
            ]);
        Alert::success('Berhasil', 'Data Berhasil Diperbaharui');
        return redirect('/admin/data_responden');
    }
}

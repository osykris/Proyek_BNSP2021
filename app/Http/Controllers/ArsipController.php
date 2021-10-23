<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\arsip_surat;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = arsip_surat::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Arsip Surat</button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Hapus</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $kategoris = kategori::all();
        return view("home", compact('kategoris'));
    }

    public function destroy($id)
    {
        $arsip = new arsip_surat();
        $arsip->deleteData($id);
        return response()->json(['success' => 'Arsip sukses di hapus']);
    }

    public function store(Request $request, arsip_surat $arsip)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'category_id' => 'required',
            'judul' => 'required',
            'filename' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $arsip->storeData($request->all());

        return response()->json(['success' => 'Arsip sukses ditambahkan']);
    }

    public function edit($id)
    {
        $arsip = new arsip_surat();
        $data = $arsip->findData($id);

        $html = ' <div class="form-group">
                    <label for="nomor_surat">Nomor Surat:</label>
                    <input type="text" class="form-control" name="nomor_surat" id="edit_nomor_surat"" value="' . $data->nomor_surat . '">
                </div>
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" class="form-control" name="judul" id="edit_judul" value="' . $data->judul . '">
                </div>
                <div class="form-group">
                <label for="file_name">File Name:</label>
                <input type="text" class="form-control" name="file_name" id="edit_filename" value="' . $data->file_name. '">
                </div>';

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'category_id' => 'required',
            'judul' => 'required',
            'filename' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $arsip = new arsip_surat();
        $arsip->updateData($id, $request->all());

        return response()->json(['success' => 'Arsip surat telah diupdate']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use App\Models\arsip_surat;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arsips = arsip_surat::all();
        return view('home', compact('arsips'));
    }

    public function indexAdd()
    {
        $kategoris = kategori::all();
        return view('addData', compact('kategoris'));
    }

    public function add(Request $request)
    {
        $kategoris = kategori::first();
        $arsip = new arsip_surat;
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_name = $request->kategori_name;
        $arsip->judul = $request->judul;
        $file = $request->file('file_name');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
        $arsip->file_surat = $nama_file;
        $arsip->save();
        alert()->success('Penambahan arsip berhasil');
        return redirect('home');
    }

    public function indexEdit($id)
    {
        $arsip = arsip_surat::where('id', $id)->first();
        return view('editData', compact('arsip'));
    }

    public function save(Request $request, $id)
    {
        $arsip = arsip_surat::findOrFail($id);
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;
        $file = $request->file('pdf');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
        $arsip->picture = $nama_file;

        $arsip->update();
        alert()->success('Data arsip berhasil diedit');
        return redirect('home');
    }

    public function delete($id)
    {
        $arsip = arsip_surat::findOrFail($id);
        $arsip->delete();
        alert()->error('Data arsip berhasil dihapus', 'Deleted');
        return redirect('home');
    }

    public function cari(Request $request){
        $judul = $request->judul;
        $arsips = arsip_surat::where('judul','like',"%".$judul."%")->paginate(2);
        return view('home', [
            'arsips' => $arsips,
            'kategoris' => kategori::all()
        ]);

    }
}

@extends('layouts.app')

@section('content')
    <br><br><br><br>
    <div class="col-md-12 mt-2">
    
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Arsip Surat</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Unggah</li>
            </ol>
        <div class="card">
            <div class="card-body">
                <h4 style="color: black;"><i class="far fa-plus-square"></i> Tambah Data</h4><br>
                
                <form method="POST" action="{{ url('home/arsip/save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="nomor_surat" class="col-md-2 col-form-label text-md-right">Nomor Surat</label>

                        <div class="col-md-6">
                            <input placeholder="Masukkan Nomor Surat.." style="background-color: #ecebeb; color: black;"
                                id="nomor_surat" type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                name="nomor_surat">

                            @error('nomor_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kategori_name" class="col-md-2 col-form-label text-md-right">Kategori</label>
                        <select class="col-md-6 custom-select" name="kategori_name" id="kategori_name">
                            <option selected>Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->name }}">{{ $kategori->id }} - {{ $kategori->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group row">
                        <label for="judul" class="col-md-2 col-form-label text-md-right">Judul</label>

                        <div class="col-md-6">
                            <input placeholder="Masukkan Judul..." style="background-color: #ecebeb; color: black;"
                                id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                                name="judul">

                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file_name" class="col-md-2 col-form-label text-md-right">Photo</label>

                        <div class="col-md-6">
                            <input value="Browse File" placeholder="Masukkan File PDF.."
                                style="background-color: #ecebeb; color: black;" id="file_name" type="file"
                                class="form-control @error('file_name') is-invalid @enderror" name="file_name">

                            @error('file_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Data Berhasil Disimpan');">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>

                <a class="btn" style="background: grey; color: white;" href="/home">
                    << Kembali </a>
            </div>
        </div>
    </div><br><br><br>
@endsection

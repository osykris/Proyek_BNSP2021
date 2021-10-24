@extends('layouts.app')

@section('content')
    <br><br><br><br>
    <div class="col-md-12 mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Arsip Surat</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/lihat') }}/{{ $arsip->id }}">Lihat</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit</li>
        </ol>
        <div class="card">
            <div class="card-body">
                <h4 style="color: black;"><i style="color: black;" class="fa fa-pencil-alt"></i> Edit Data</h4>
                <br>
                <form method="POST" action="{{ url('home/arsip/edit') }}/{{ $arsip->id }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="nomor_surat"
                            class="col-md-2 col-form-label text-md-right">{{ __('Nomor Surat') }}</label>

                        <div class="col-md-6">
                            <input style="background-color: #ecebeb; color: black;" id="nomor_surat" type="text"
                                class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat"
                                value="{{ $arsip->nomor_surat }}" required autocomplete="nomor_surat" autofocus>

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
                        <label for="judul" class="col-md-2 col-form-label text-md-right">{{ __('Judul') }}</label>

                        <div class="col-md-6">
                            <input style="background-color: #ecebeb; color: black;" id="judul" type="text"
                                class="form-control @error('judul') is-invalid @enderror" name="judul"
                                value="{{ $arsip->judul }}" required autocomplete="judul" autofocus>

                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created_at"
                            class="col-md-2 col-form-label text-md-right">{{ __('Waktu Pengarsipan') }}</label>

                        <div class="col-md-6">
                            <input style="background-color: #ecebeb; color: black;" id="created_at" type="datetime"
                                class="form-control @error('created_at') is-invalid @enderror" name="created_at"
                                value="{{ $arsip->created_at }}" readonly required autocomplete="created_at" >

                            @error('created_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file_surat"
                            class="col-md-2 col-form-label text-md-right">{{ __('File Surat') }}</label>

                        <div class="col-md-6">
                            <input style="background-color: #ecebeb; color: black;" id="file_surat" type="file"
                                class="form-control @error('qty') is-invalid @enderror" name="file_surat"
                                value="{{ $arsip->file_surat }}" required autocomplete="file_surat" autofocus>

                            @error('file_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <a class="btn" style="background: grey; color: white;" href="{{ url('home/lihat') }}/{{ $arsip->id }}">
                                << Kembali </a>
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div><br><br><br>
@endsection

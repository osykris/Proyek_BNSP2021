@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Arsip Surat</a></li>
                    <li class="breadcrumb-item active"  aria-current="page">Lihat</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 style="color: black;"><i class="fa fa-user" style="color: black;"></i> Detail Arsip Surat</h4>
                    @foreach ($arsips as $arsip)
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Nomor</td>
                                <td width="10">:</td>
                                <td>{{ $arsip->nomor_surat }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td>{{ $arsip->kategori_name }}</td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td>{{ $arsip->judul }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Unggah</td>
                                <td>:</td>
                                <td>{{ $arsip->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <iframe src="{{ url('uploads') }}/{{ $arsip->file_surat }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                    <br><br>
                <a class="btn" style="background: grey; color: white;" href="/home">
                    << Kembali </a>
                    <a class="btn" style="background: yellow;" href="{{ url('home/unduh') }}/{{ $arsip->id }}" onclick="return confirm('Yakin ingin mendownload file ini?');">
                        Unduh </a>
                        <a class="btn" style="background: orange;" href="{{ url('home/arsip/edit') }}/{{ $arsip->id }}">
                            Edit/Ganti File </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<br><br><br><br>
<!-- Main content -->
<section class="content">
    <div class="row mb-2">
        <div class="col">
                    <div class="col-md-7" align="right">
                        <div class="input-group mb-3">
                        <form action="{{ url('cari') }}" method="GET">
                            <input type="text" name="judul" placeholder="Cari Sesuai Judul" class="form-control bg-white" >
                        </form>
                            <div class="input-group-prepend">
                                <span class="input-group-text"  style="background-color: #008B8B" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Arsip</h3><br>
                    </div>    
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <div class="card-sub">
                            <a href="{{ url('home/arsip/add') }}" class="btn btn-danger btn-sm">Arsipkan Surat</a>
                        </div>
                        <table class="table table-hover text-nowrap" id="datatable">
                            <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nomor Surat </th>
                                <th> Kategori </th>
                                <th> Judul </th>
                                <th> Waktu Pengarsipan </th>
                                <th> Aksi </th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($arsips as $arsip)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $arsip->nomor_surat }}</td>
                                    <td>{{ $arsip->kategori_name }}</td>
                                    <td>{{ $arsip->judul }}</td>
                                    <td>{{ $arsip->created_at }}</td>
                                    <td>
                                    <form action="{{ url('home/arsip') }}/{{ $arsip->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus arsip ini?');">Hapus</button><br>
                                    </form>
                                    <a class="btn" style="background: yellow" href="{{ url('home/unduh') }}/{{ $arsip->id }}" onclick="return confirm('Yakin ingin mendownload file ini?');">Unduh</a>
                                    <a class="btn btn-info " href="{{ url('home/lihat') }}/{{ $arsip->id }}">Lihat >> </a><br></br>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br><br>
   
@endsection

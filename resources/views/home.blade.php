@extends('layouts.app')

@section('content')
<br><br><br><br>
<div class="margin-top-0">
                <div class="row intro-text align-items-center justify-content-center">
                    <div class="col-md-10 animated tada">
                        <center>
                            <h1 class="site-heading site-animate" style="font-size: 30px;"><strong class="d-block"
                                    data-scrollreveal="enter top over 1.5s after 0.1s">ARSIP SURAT</strong> Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. </h1>
                        </center>
                    </div>
                </div>
</div><br><br>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="col-md-12">
                    <h6 class="m-0 font-weight-bold" style="color: 	#8B0000;">Data Arsip
                        <button style="float: right; font-weight: 600; background: 	#8B0000; color: white;" class="btn " type="button" data-toggle="modal" data-target="#CreateArticleModal">
                            Buat Arsip Baru
                        </button>
                    </h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="color: #708090;" class="table table-bordered table-striped yajra-datatable" id="data_users_side" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Kategori ID</th>
                                <th>Judul</th>
                                <th>Waktu Pengarsipan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Article Modal -->
    <div class="modal" id="CreateArticleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Buat Arsip</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Success!</strong>Arsip baru telah ditambahkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="form-group">
                        <label for="nomor_surat">Nomor Surat:</label>
                        <input type="text" class="form-control" name="nomor_surat" id="nomor_surat">
                    </div>
                    {{-- <div class="form-group">
                        <label for="katgeori_id">Kategori ID:</label>
                        <select class="custom-select" name="kategori_id" id="kategori_id">
                            <option selected>Select The Category</option>
                            @foreach($kategoris $kategori)
                            <option  value="{{ $kategori->id }}">{{ $kategori->id }} - {{ $kategori->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul">
                    </div>
                    <div class="form-group">
                        <label for="filename">File Name:</label>
                        <input type="text" class="form-control" name="filename" id="filename">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="SubmitCreateArticleForm">Buat</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Edit Article Modal -->
    <div class="modal" id="EditArticleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Arsip Surat</h4>
                    <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Success!</strong>Arsip Surat telah diperbarui.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="EditArticleModalBody">
    
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="SubmitEditArticleForm">Save</button>
                    <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal" id="DeleteArticleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Apakah Anda yakin ingin menghapus arsip ini?</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    
    <script type="text/javascript">
        $(function() {
    
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 5,
                ajax: "{{ route('index_get_arsip.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        sClass: 'text-center'
                    },
                    
                    {
                        data: 'nomor_surat',
                        name: 'nomor_surat',
                        sClass: 'text-center'
                    },
                    {
                        data: 'kategori_id',
                        name: 'kategori_id',
                        sClass: 'text-center'
                    },
                    {
                        data: 'judul',
                        name: 'judul',
                        sClass: 'text-center'
                    },
                    {
                        data: 'filename',
                        name: 'filename',
                        sClass: 'text-center'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        sClass: 'text-center'
                    },
                ]
            });
            // Create article Ajax request.
            $('#SubmitCreateArticleForm').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('index_get_arsip.store') }}",
                    method: 'POST',
                    data: {
                        nomor_surat: $('#nomor_surat').val(),
                        kategori_id: $('#kategori_id').val(),
                        judul: $('#judul').val(),
                        filename: $('#filename').val(),
                    },
                    success: function(result) {
                        if (result.errors) {
                            $('.alert-danger').html('');
                            $.each(result.errors, function(key, value) {
                                $('.alert-danger').show();
                                $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
                            });
                        } else {
                            $('.alert-danger').hide();
                            $('.alert-success').show();
                            $('.yajra-datatable').DataTable().ajax.reload();
                            setInterval(function() {
                                $('.alert-success').hide();
                                $('#CreateArticleModal').modal('hide');
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            });
    
            // Get single article in EditModel
            $('.modelClose').on('click', function() {
                $('#EditArticleModal').hide();
            });
            var id;
            $('body').on('click', '#getEditArticleData', function(e) {
                // e.preventDefault();
                $('.alert-danger').html('');
                $('.alert-danger').hide();
                id = $(this).data('id');
                $.ajax({
                    url: "index_get_arsip/" + id + "/arsipsurat",
                    method: 'GET',
                    // data: {
                    //     id: id,
                    // },
                    success: function(result) {
                        console.log(result);
                        $('#EditArticleModalBody').html(result.html);
                        $('#EditArticleModal').show();
                    }
                });
            });
    
            // Update article Ajax request.
            $('#SubmitEditArticleForm').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "index_get_arsip/" + id,
                    method: 'PUT',
                    data: {
                        nomor_surat: $('#edit_nomorsurat').val(),
                        judul: $('#edit_judul').val(),
                        filename: $('#edit_filename').val(),
                    },
                    success: function(result) {
                        if (result.errors) {
                            $('.alert-danger').html('');
                            $.each(result.errors, function(key, value) {
                                $('.alert-danger').show();
                                $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
                            });
                        } else {
                            $('.alert-danger').hide();
                            $('.alert-success').show();
                            $('.yajra-datatable').DataTable().ajax.reload();
                            setInterval(function() {
                                $('.alert-success').hide();
                                $('#EditArticleModal').hide();
                            }, 2000);
                        }
                    }
                });
            });
    
            // Delete article Ajax request.
            var deleteID;
            $('body').on('click', '#getDeleteId', function() {
                deleteID = $(this).data('id');
            })
            $('#SubmitDeleteArticleForm').click(function(e) {
                e.preventDefault();
                var id = deleteID;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "index_get_arsip/" + id,
                    method: 'DELETE',
                    success: function(result) {
                        setInterval(function() {
                            $('.yajra-datatable').DataTable().ajax.reload();
                            $('#DeleteArticleModal').hide();
                        }, 1000);
                    }
                });
            });
    
        });
    </script>
@endsection

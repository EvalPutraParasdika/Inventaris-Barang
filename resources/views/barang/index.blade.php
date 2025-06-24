@extends('main')
@section('title', 'Data Barang')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- DataTable Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mr-5">Data Barang</h3>
                            <button class="btn btn-primary btn-round mr-auto" data-toggle="modal"
                                data-target="#TambahBarang">
                                <i class="fa fa-plus"></i> Add Barang
                            </button>
                            {{-- <a href="{{ route('barang.exportPDF') }}"
                                class="btn btn-outline-warning btn-round ms-auto">
                                <i class="far fa-file-pdf"></i> Unduh </a> --}}
                        </div>

                        <div class="card-body">
                            <!-- Modal Tambah Barang -->
                            <div class="modal fade" id="TambahBarang" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Barangs</span>
                                                <span class="fw-light"> Datas </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @include('barang.create')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $barang)
                                        <tr>
                                        
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barang->id_barang }}</td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                                            <td>{{ $barang->lokasi->nama_lokasi ?? '-' }}</td>
                                            <td>{{ $barang->stok }}</td>
                                            <td>Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
                                        
                                        <td>
                                            <div class="d-flex justify-content-center mr-2">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#EditBarang{{ $barang->id_barang }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST"
                                                    class="ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="EditBarang{{$barang->id_barang}}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">
                                                            Edit Data Barang
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('barang.edit')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <!-- Page specific script -->
        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": [
                        "copy",
                        {
                            extend: 'excel',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'pdf',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        }
                    ]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
@endsection
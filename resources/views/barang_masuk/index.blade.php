@extends('main')
@section('title', 'Data Barang Masuk')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Masuk</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mr-5">Riwayat Barang Masuk</h3>
                            <button class="btn btn-primary btn-round mr-auto" data-toggle="modal"
                                data-target="#TambahBarangMasuk">
                                <i class="fa fa-plus"></i> Tambah Barang Masuk
                            </button>
                        </div>

                        <div class="card-body">
                            <!-- Modal Tambah Barang Masuk -->
                            <div class="modal fade" id="TambahBarangMasuk" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Tambah</span>
                                                <span class="fw-light"> Barang Masuk </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @include('barang_masuk.create')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $masuk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $masuk->barang->nama_barang ?? '-' }}</td>
                                            <td>{{ $masuk->jumlah }}</td>
                                            <td>{{ \Carbon\Carbon::parse($masuk->tanggal)->format('d-m-Y') }}</td>
                                            <td>{{ $masuk->keterangan ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- Tombol Edit -->
                                                    <button type="button" class="btn btn-sm btn-primary mr-1"
                                                        data-toggle="modal"
                                                        data-target="#EditBarangMasuk{{ $masuk->id_barang_masuk }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <form action="{{ route('barang_masuk.destroy', $masuk->id_barang_masuk) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                            </td>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="EditBarangMasuk{{$masuk->id_barang_masuk}}" tabindex="-1"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Edit Data Barang Masuk
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('barang_masuk.edit')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @push('scripts')
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
            });
        </script>
    @endpush
@endsection
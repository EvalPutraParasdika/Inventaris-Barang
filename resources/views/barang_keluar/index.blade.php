@extends('main')
@section('title', 'Data Barang Keluar')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang Keluar</h1>
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
                            <h3 class="card-title mr-5">Riwayat Barang Keluar</h3>
                            <button class="btn btn-primary btn-round mr-auto" data-toggle="modal"
                                data-target="#TambahBarangKeluar">
                                <i class="fa fa-plus"></i> Tambah Barang Keluar
                            </button>
                        </div>

                        <div class="card-body">
                            <!-- Modal Tambah Barang Keluar -->
                            <div class="modal fade" id="TambahBarangKeluar" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Tambah</span>
                                                <span class="fw-light"> Barang Keluar </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @include('barang_keluar.create')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Keluar</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $keluar)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $keluar->barang->nama_barang ?? '-' }}</td>
                                            <td>{{ $keluar->jumlah }}</td>
                                            <td>{{ \Carbon\Carbon::parse($keluar->tanggal)->format('d-m-Y') }}</td>
                                            <td>{{ $keluar->keterangan ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <!-- Tombol Edit -->
                                                    <button type="button" class="btn btn-sm btn-primary mr-1"
                                                        data-toggle="modal"
                                                        data-target="#EditBarangKeluar{{ $keluar->id_barang_keluar }}">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <form action="{{ route('barang_keluar.destroy', $keluar->id_barang_keluar) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                            </td>
                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="EditBarangKeluar{{$keluar->id_barang_keluar}}" tabindex="-1"
                                                aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Edit Data Barang Keluar
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @include('barang_keluar.edit')
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
@extends('main')

@section('content')
<!-- Contoh content dashboard -->
<div class="container my-4 align-items-center">
    <div class="row g-4">
        <!-- Card Mahasiswa -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-people-fill fs-1 text-primary"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">Mahasiswa</h6>
                        {{-- <h4 class="mb-0 fw-bold">{{ $mahasiswas }}</h4> <!-- Ganti angka sesuai data --> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Buku -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-book-half fs-1 text-success"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">Buku</h6>
                        {{-- <h4 class="mb-0 fw-bold">{{ $bukus }}</h4> <!-- Ganti angka sesuai data --> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Peminjaman -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-journal-arrow-up fs-1 text-warning"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted">Peminjaman Buku</h6>
                        {{-- <h4 class="mb-0 fw-bold">{{ $peminjamans }}</h4> <!-- Ganti angka sesuai data --> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
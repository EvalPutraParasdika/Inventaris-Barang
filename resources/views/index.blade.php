@extends('main')
@section('title', 'Dashboard')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h1>Dashboard</h1>
    </div>
</section>

<section class="content">
    <div class="row">

        <!-- Total Barang -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlahBarang }}</h3>
                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>

        <!-- Barang Masuk -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $jumlahBarangMasuk }}</h3>
                    <p>Barang Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-down"></i>
                </div>
            </div>
        </div>

        <!-- Barang Keluar -->
        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $jumlahBarangKeluar }}</h3>
                    <p>Barang Keluar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-up"></i>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

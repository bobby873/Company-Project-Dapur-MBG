@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>Selamat Datang di Dapur MBG</h1>

    <div class="my-4">
        <img src="{{ asset('images/logombg.png') }}" alt="Logo MBG" class="rounded-circle" style="width: 400px; height: 400px; object-fit: cover;">
    </div>

    <p class="lead">Kami adalah Satuan Pelayanan Pemenuhan Gizi yang sudah berhasil mengirimkan MBG ke 2345 Penerima Manfaat mulai dari TK,SD,SMP,SMA,Bumil/Busui dan Balita sejak 1 Januari 2026</p>

    <div class="row mt-5 text-center">
        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow-sm border-0 bg-dark text-white">
                <h3>5+ Bulan</h3>
                <p>Pengalaman Operasional</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 shadow-sm border-0 bg-success text-white">
                <h3>2643</h3>
                <p>Total Penerima Manfaat</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 shadow-sm border-0 bg-warning text-dark card-statistik"
         data-bs-toggle="modal"
         data-bs-target="#modalMenuHarian"
         style="cursor: pointer;">
        <h3>5+ Star</h3>
        <p>Rating Kualitas Gizi</p>
        <small class="text-muted text-decoration-underline">Klik untuk melihat menu</small>
    </div>
</div>
     <div class="modal fade" id="modalMenuHarian" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen">
        <div class="modal-content border-0">
            <div class="modal-header bg-warning text-dark py-3">
                <h5 class="modal-title fw-bold">Menu Harian Bergizi - Dapur MBG</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
            <div class="container">
                <p class="text-center mb-4">Dokumentasi menu harian yang kami sajikan untuk para penerima manfaat.</p>

                <div class="row g-3"> <div class="col-6 col-md-4">
                        <img src="{{ asset('images/28april.png') }}" class="img-fluid rounded shadow-sm" alt="Menu 1">
                        <p class="small text-center mt-2">Nasi, Ayam Bakar, Sayur</p>
                    </div>

                    <div class="col-6 col-md-4">
                        <img src="{{ asset('images/27april.png') }}" class="img-fluid rounded shadow-sm" alt="Menu 2">
                        <p class="small text-center mt-2">Nasi, Ikan Goreng, Capcay</p>
                    </div>

                    <div class="col-6 col-md-4">
                        <img src="{{ asset('images/29april.png') }}" class="img-fluid rounded shadow-sm" alt="Menu 3">
                        <p class="small text-center mt-2">Buah & Susu Tambahan</p>
                    </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

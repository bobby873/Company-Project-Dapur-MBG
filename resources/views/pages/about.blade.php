@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5">Struktur Jabatan SPPG Cibeuteung Muara 01</h2>

    <div class="row text-center justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('images/BOBY.png') }}" class="rounded-circle mb-3" style="width: 370px; height: 370px; object-fit: cover;">
                <h5>ASISTEN LAPANGAN</h5>
                <button type="button" class="btn btn-primary rounded-pill px-4 mb-3" data-bs-toggle="modal" data-bs-target="#modalAsisten">
                    Lihat Identitas
                </button>
                <p class="text-muted" style="max-width: 250px;">Bertanggung jawab atas seluruh operasional harian.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('images/hero.png') }}" class="rounded-circle mb-3" style="width: 500px; height: 500px; object-fit: cover;">
                <h5>KEPALA SPPG</h5>
                <button type="button" class="btn btn-primary rounded-pill px-4 mb-3" data-bs-toggle="modal" data-bs-target="#modalKepala">
                    Lihat Identitas
                </button>
                <p class="text-muted" style="max-width: 250px;">Memonitoring seluruh alur kerja Dapur MBG agar sesuai dengan SOP.</p>
            </div>
        </div>


        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('images/Sindy.jpeg') }}" class="rounded-circle mb-3" style="width: 360px; height: 360px; object-fit: cover;">
                <h5>AKUNTANSI</h5>
                <button type="button" class="btn btn-primary rounded-pill px-4 mb-3" data-bs-toggle="modal" data-bs-target="#modalAkuntansi">
                    Lihat Identitas
                </button>
                <p class="text-muted" style="max-width: 250px;">Bertanggungjawab dalam mengatur seluruh keuangan dapur.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <img src="{{ asset('images/AG.png') }}" class="rounded-circle mb-3" style="width: 250px; height: 250px; object-fit: cover;">
                <h5>AHLI GIZI</h5>
                <button type="button" class="btn btn-primary rounded-pill px-4 mb-3" data-bs-toggle="modal" data-bs-target="#modalGizi">
                    Lihat Identitas
                </button>
                <p class="text-muted" style="max-width: 250px;">Menjamin keamanan, mutu, dan kandungan gizi makanan.</p>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalKepala" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Identitas Kepala SPPG</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/hero.png') }}" class="img-fluid rounded mb-4">
                <div class="text-start px-3">
                    <p><strong>Nama: </strong> Hero Gustian</p>
                    <p><strong>Umur: </strong> 25 Tahun</p>
                    <p><strong>Pendidikan: </strong> Strata 1</p>
                    <p><strong>Hoby: </strong> Bermain Game</p>
                    <p><strong>Status: </strong> Belum Menikah</p>
                    <p><strong>Tugas:</strong> Pengawas utama operasional dapur dan distribusi makanan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAsisten" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Identitas Asisten Lapangan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/BOBY.png') }}" class="img-fluid rounded mb-4">
                <div class="text-start px-3">
                    <p><strong>Nama: </strong> Boby Regielma Ginting </p>
                    <p><strong>Umur: </strong> 20 Tahun </p>
                    <p><strong>Pendidikan: </strong> SMK </p>
                    <p><strong>Hoby: </strong> Bermain Musik </p>
                    <p><strong>Tugas:</strong> Mengoordinasikan tim di lapangan dan memastikan MBG sampai di tangan anak sekolah dengan aman dan selamat.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAkuntansi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Identitas Akuntansi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/Sindy.jpeg') }}" class="img-fluid rounded mb-4">
                <div class="text-start px-3">
                    <p><strong>Nama: </strong>Cindy Ayu Sugiyanti</p>
                    <p><strong>Umur: </strong>23 Tahun</p>
                    <p><strong>Pendidikan: </strong>Strata 1</p>
                    <p><strong>Hoby: </strong>Memasak</p>
                    <p><strong>Tugas:</strong> Manajemen anggaran belanja bahan baku dan penggajian.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGizi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Identitas Ahli Gizi</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('images/AG.png') }}" class="img-fluid rounded mb-4">
                <div class="text-start px-3">
                    <p><strong>Nama: </strong>Anindita Irbah Tyto Putri</p>
                    <p><strong>Umur: </strong>28 Tahun</p>
                    <p><strong>Pendidikan: </strong>Strata 1</p>
                    <p><strong>Hoby: </strong>Membaca</p>
                    <p><strong>Tugas:</strong> Menyusun menu seimbang dan mengaudit kebersihan bahan makanan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Dashboard Admin</h2>
            <p class="text-muted small mb-0">Selamat datang, {{ session('admin_name') }}! Kelola sistem Dapur MBG di sini.</p>
        </div>
        <div>
            <!-- Tombol Cetak PDF Laporan (Fitur Wajib UAS) -->
            <a href="/admin/report/pdf" target="_blank" class="btn btn-outline-danger fw-bold btn-sm me-2">
                <i class="fas fa-file-pdf"></i> Cetak Laporan PDF
            </a>
            <!-- Tombol Tambah Artikel -->
            <a href="/admin/article/create" class="btn btn-primary fw-bold btn-sm me-2">
                <i class="fas fa-plus"></i> Tambah Artikel Baru
            </a>
            <!-- Form Logout -->
            <form action="/login" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                @csrf
                <button type="submit" formaction="/logout" class="btn btn-outline-danger fw-bold btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </button>
            </form>
        </div>
    </div>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show small py-2" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Ringkasan Jumlah Data (Sesuai Ketentuan UAS) -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-0 bg-primary text-white shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <h6 class="text-white-50 small text-uppercase mb-1 fw-bold">Total Artikel</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $totalArticles }}</h2>
                    </div>
                    <div class="opacity-50">
                        <i class="fas fa-newspaper fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 bg-success text-white shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <h6 class="text-white-50 small text-uppercase mb-1 fw-bold">Menu / Layanan</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $totalProducts }}</h2>
                    </div>
                    <div class="opacity-50">
                        <i class="fas fa-utensils fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 bg-info text-white shadow-sm">
                <div class="card-body d-flex align-items-center justify-content-between p-4">
                    <div>
                        <h6 class="text-white-50 small text-uppercase mb-1 fw-bold">Dokumentasi Galeri</h6>
                        <h2 class="display-6 fw-bold mb-0">{{ $totalGallery }}</h2>
                    </div>
                    <div class="opacity-50">
                        <i class="fas fa-images fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div clas
    s="col-md-6 mb-4">
    <div class="card h-100 shadow-sm border-0">
        <div class="card-body d-flex flex-column align-items-start p-4">
            <div class="bg-success bg-opacity-10 text-success p-3 rounded-3 mb-3">
                <i class="fas fa-utensils fa-2x"></i>
            </div>
            <h5 class="fw-bold text-dark">Manajemen Menu Makanan</h5>
            <p class="text-muted small">Update menu harian, jumlah porsi operasional relawan, serta dokumentasi foto makanan untuk konsumsi sekolah.</p>
            <div class="mt-auto w-100">
                <a href="/admin/products" class="btn btn-success fw-bold btn-sm w-100 py-2">
                    <i class="fas fa-cog me-1"></i> Masuk Kelola Menu
                </a>
            </div>
        </div>
    </div>
</div>

    <!-- Tabel Data Artikel -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3" style="width: 5%;">No</th>
                            <th style="width: 15%;">Gambar</th>
                            <th style="width: 35%;">Judul Artikel</th>
                            <th style="width: 20%;">Tanggal Rilis</th>
                            <th class="text-end pe-3" style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $index => $item)
                            <tr>
                                <td class="ps-3 fw-bold text-secondary">{{ $index + 1 }}</td>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="rounded shadow-sm" alt="Gambar" style="width: 70px; height: 50px; object-fit: cover;">
                                    @else
                                        <span class="badge bg-light text-secondary border small">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold text-dark d-block text-truncate" style="max-width: 300px;">{{ $item->title }}</span>
                                    <small class="text-muted text-truncate d-block" style="max-width: 300px;">{{ Str::limit($item->content, 60) }}</small>
                                </td>
                                <td class="text-secondary small">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}
                                </td>
                                <td class="text-end pe-3">
                                    <a href="/admin/article/{{ $item->id }}/edit" class="btn btn-outline-warning btn-sm fw-bold me-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="/admin/article/{{ $item->id }}/delete" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE') <button type="submit" class="btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-folder-open fa-3x mb-3 d-block text-secondary"></i>
                                    Belum ada artikel yang diterbitkan. Klik tombol di atas untuk membuat artikel pertama!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


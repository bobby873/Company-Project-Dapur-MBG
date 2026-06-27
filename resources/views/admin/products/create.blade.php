@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-3">
                <a href="/admin/products" class="btn btn-light shadow-sm btn-sm px-3 me-3 fw-bold text-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <h4 class="fw-bold text-dark mb-0">Tambah Menu Makanan Baru</h4>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="/admin/products/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Menu Makanan</label>
                            <input type="text" class="form-class form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Nasi Ayam Goreng Madu + Sayur Sop">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_porsi" class="form-label fw-bold">Jumlah Alokasi Porsi</label>
                            <input type="number" class="form-control @error('total_porsi') is-invalid @enderror" id="total_porsi" name="total_porsi" value="{{ old('total_porsi') }}" placeholder="Contoh: 150">
                            @error('total_porsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Foto Dokumentasi Menu</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            <div class="form-text text-muted">Format file yang diizinkan: JPG, JPEG, PNG, WEBP (Maksimal 2MB)</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success fw-bold w-100 py-2.5 shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Menu Makanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

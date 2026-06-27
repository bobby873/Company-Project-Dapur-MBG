@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-3">
                <a href="/admin/products" class="btn btn-light shadow-sm btn-sm px-3 me-3 fw-bold text-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <h4 class="fw-bold text-dark mb-0">Edit Data Menu Makanan</h4>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="/admin/products/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nama Menu Makanan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="total_porsi" class="form-label fw-bold">Jumlah Alokasi Porsi</label>
                            <input type="number" class="form-control @error('total_porsi') is-invalid @enderror" id="total_porsi" name="total_porsi" value="{{ old('total_porsi', $product->total_porsi) }}">
                            @error('total_porsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Foto Menu Sekarang</label>
                            @if($product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Foto Lama" class="img-thumbnail shadow-sm" style="max-height: 150px;">
                                </div>
                            @endif
                            <label for="image" class="form-label small text-secondary">Ganti Foto Baru (Kosongkan jika tidak ingin diubah)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-warning text-white fw-bold w-100 py-2.5 shadow-sm">
                            <i class="fas fa-edit me-1"></i> Perbarui Data Menu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

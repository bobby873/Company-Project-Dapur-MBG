@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/admin/dashboard" class="btn btn-light btn-sm mb-4">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-dark mb-4">Tambah Artikel Baru</h3>

                    @if($errors->any())
                        <div class="alert alert-danger py-2 small">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/admin/article/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label small fw-bold">Judul Artikel</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Masukkan judul artikel" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label small fw-bold">Gambar Unggulan (Opsional)</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <div class="form-text text-muted small">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</div>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label small fw-bold">Isi Konten Artikel</label>
                            <textarea name="content" id="content" rows="8" class="form-control" placeholder="Tuliskan berita lengkap di sini..." required>{{ old('content') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="/admin/dashboard" class="btn btn-light fw-bold px-4">Batal</a>
                            <button type="submit" class="btn btn-primary fw-bold px-4">Terbitkan Artikel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content') <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark"><i class="fas fa-utensils me-2 text-success"></i>Manajemen Menu Makanan</h2>
        <a href="/admin/products/create" class="btn btn-success fw-bold px-4 py-2 shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Menu Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary text-uppercase fs-7">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Foto Menu</th>
                            <th>Nama Menu Makanan</th>
                            <th>Total Alokasi Porsi</th>
                            <th>Tanggal Dibuat</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $product)
                            <tr>
                                <td class="ps-4 fw-bold">{{ $index + 1 }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded shadow-sm" style="width: 70px; height: 50px; object-fit: cover;">
                                    @else
                                        <span class="badge bg-secondary">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td><span class="fw-bold text-dark">{{ $product->name }}</span></td>
                                <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-2 fw-bold">{{ $product->total_porsi }} Porsi</span></td>
                                <td class="text-muted small">{{ $product->created_at->format('d M Y, H:i') }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm fw-bold text-white px-3 shadow-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="/admin/products/{{ $product->id }}/delete" method="POST" onsubmit="return confirm('Yakin pengen hapus menu ini, Bob?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm fw-bold px-3 shadow-sm">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-utensils fa-3x mb-3 text-secondary"></i>
                                    <p class="mb-0 fw-bold">Belum ada menu makanan yang terdaftar.</p>
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

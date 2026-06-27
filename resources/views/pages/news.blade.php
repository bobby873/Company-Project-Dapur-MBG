    @extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Berita Seputar Makan Bergizi Gratis</h1>
        <p class="text-muted">Update informasi terbaru mengenai program Dapur MBG</p>
    </div>

    <div class="row">
        @forelse($articles as $item)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <div class="badge bg-primary mb-2">Berita Utama</div>
                        <h3 class="h4 card-title fw-bold">{{ $item->title }}</h3>
                        <p class="text-muted small">Diterbitkan pada: {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</p>
                        <p class="card-text text-secondary">
                            {{ Str::limit($item->content, 150) }}
                        </p>
                        <hr>
                        <a href="#" class="text-primary text-decoration-none fw-bold">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">Belum ada berita yang diinput dari Seeder.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
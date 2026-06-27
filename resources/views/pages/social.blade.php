@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2>Ikuti Media Sosial Kami</h2>
    <p class="lead">Dapatkan update terbaru dari Dapur MBG Cibeuteung Muara</p>

    <div class="d-flex justify-content-center gap-5 my-5">
        <a href="https://www.instagram.com/sppg_cibeuteungmuara/..." target="_blank" class="text-danger"><i class="fab fa-instagram fa-5x"></i></a>
        <a href="https://www.tiktok.com/@sppg_cibeuteungmuara?is_from_webapp=1&sender_device=pc/..." target="_blank" class="text-dark"><i class="fab fa-tiktok fa-5x"></i></a>
        <a href="https://www.facebook.com/profile.php?id=61587850211988/..." target="_blank" class="text-primary"><i class="fab fa-facebook fa-5x"></i></a>
    </div>

    <div class="container mt-5">
        <hr>
        <h3 class="text-center my-4">Update Terbaru dari Kami</h3>
        <div class="row text-start"> <!-- Ditambahkan text-start agar teks artikel rata kiri (lebih rapi) -->
            @foreach($articles as $item)
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0 h-100"> <!-- Ditambahkan h-100 agar tinggi kartu sama rata -->

                    <!-- 1. Menampilkan Gambar Artikel jika ada -->
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6 class="fw-bold">{{ $item->title }}</h6>
                            <p class="small text-muted mb-2">
                                {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y') : $item->created_at->format('d M Y') }}
                            </p>
                            <!-- Menampilkan cuplikan konten pendek -->
                            <p class="card-text small text-secondary">{{ Str::limit($item->content, 100) }}</p>
                        </div>

                        <!-- 2. Mengubah Link Detail mengarah ke rute internal /news dengan ID artikel -->
                        <div class="mt-3">
                            <a href="/news/{{ $item->id }}" class="btn btn-outline-primary btn-sm w-100">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/social-media" class="btn btn-light btn-sm mb-4"><i class="fas fa-arrow-left"></i> Kembali ke Media Sosial</a>

            <h1 class="fw-bold mb-3">{{ $article->title }}</h1>

            <p class="text-muted small mb-4">
                <i class="fas fa-calendar-alt"></i>
                {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : $article->created_at->format('d F Y') }}
            </p>

            @if($article->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $article->title }}" style="max-height: 450px; object-fit: cover;">
                </div>
            @endif

            <div class="article-content lh-lg text-secondary" style="font-size: 1.1rem; white-space: pre-line;">
                {{ $article->content }}
            </div>
        </div>
    </div>
</div>
@endsection

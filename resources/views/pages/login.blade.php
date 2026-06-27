@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow border-0" style="width: 100%; max-width: 400px;">
        <div class="card-body p-4">
            <h3 class="text-center fw-bold mb-2">Login Admin</h3>
            <p class="text-muted text-center small mb-4">Dapur MBG Cibeuteung Muara</p>

            @if($errors->any())
                <div class="alert alert-danger py-2 small">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label small fw-bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label small fw-bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2">Masuk</button>
            </form>
        </div>
    </div>
</div>
@endsection

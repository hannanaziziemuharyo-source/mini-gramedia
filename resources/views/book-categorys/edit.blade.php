@extends('layout.app')

@section('content')
<div class="container py-4">
    {{-- Breadcrumb Navigasi --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.kategori-buku.index') }}">Kategori Buku</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
        </ol>
    </nav>

    {{-- Header Halaman --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="page-title fw-bold text-dark m-0">Edit Kategori Buku</h2>
            <p class="text-secondary small m-0">Perbarui data kategori buku</p>
        </div>
        <a href="{{ route('admin.kategori-buku.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- Alert Validasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible shadow-sm mb-4" role="alert">
            <div class="d-flex">
                <div class="me-2">
                    <i class="fa-solid fa-circle-exclamation fs-3 text-danger"></i>
                </div>
                <div>
                    <h4 class="alert-title mb-1">Gagal Memperbarui!</h4>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    {{-- Form Edit Kategori --}}
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h3 class="card-title m-0 fw-bold text-dark">
                        <i class="fa-solid fa-pen-to-square text-primary me-2"></i> Form Edit Kategori
                    </h3>
                </div>

                <form action="{{ route('admin.kategori-buku.update', $category->id) }}" method="POST">
                    @csrf
                    {{-- overide method : mengganti method "POST" menjadi PUT sesuai dengan HTTP method yg
                        di route nya --}}
                    @method('PUT')
                    
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label required fw-semibold">Nama Kategori</label>
                            {{-- old('name', $bookCategory->name) : jika ada error validasi, tampilkan nilai
                                nilai sebelumnya pada inputan ini, jika tidak ada, tampilkan nilai dari $bookCategory->name --}}
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name', $bookCategory->name ?? $category->name) }}"
                                placeholder="Contoh: Fiksi, Komik, Sejarah..."
                                autofocus
                                required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-hint text-muted mt-1">
                                Pastikan nama kategori belum digunakan oleh kategori lain.
                            </small>
                        </div>
                    </div>

                    <div class="card-footer bg-light d-flex justify-content-between align-items-center py-3">
                        <a href="{{ route('admin.kategori-buku.index') }}" class="btn btn-link text-secondary">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

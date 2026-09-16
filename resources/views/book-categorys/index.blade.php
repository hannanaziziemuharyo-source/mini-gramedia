@extends('layout.app')

@section('content')
<div class="container py-4">

    {{-- Flash Message Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4 shadow-sm" role="alert">
            <div class="d-flex">
                <div class="me-2">
                    <i class="fa-solid fa-circle-check fs-3 text-success"></i>
                </div>
                <div>
                    <h4 class="alert-title mb-1">Berhasil!</h4>
                    <div class="text-secondary">{{ session('success') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    {{-- Breadcrumb Navigasi --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Buku</li>
        </ol>
    </nav>

    {{-- Header Halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title fw-bold text-dark m-0">Kategori Buku</h2>
            <p class="text-secondary small m-0">Kelola semua kategori dan pengelompokan buku</p>
        </div>
        <a href="{{ route('admin.kategori-buku.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Tambah Kategori Buku
        </a>
    </div>

    {{-- Tabel Daftar Kategori --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom py-3">
            <h3 class="card-title m-0 fw-bold text-dark">
                <i class="fa-solid fa-layer-group text-primary me-2"></i> Daftar Kategori
            </h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter card-table table-hover">
                <thead class="table-light">
                    <tr>
                        <th class="w-1">No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Buku</th>
                        <th>Tanggal Dibuat</th>
                        <th class="w-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- pengguna foreach karena bookCategories merupakan array multidimensi maka
                        bookCategory akan berupa aray asosiatif. mengaksesnya dengan menggunakan -> atau [] --}}
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            <tr>
                                {{-- loop iteration fungsinya untuk menampilkan nomor urut --}}
                                <td class="text-secondary">{{ $loop->iteration }}</td>
                                <td class="fw-semibold text-dark">{{ $category->name }}</td>
                                <td>
                                    <span class="badge bg-blue-lt">
                                        {{ $category->books_count ?? 0 }} Buku
                                    </span>
                                </td>
                                <td class="text-secondary">
                                    {{ $category->created_at ? $category->created_at->format('d M Y, H:i') : '-' }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.kategori-buku.edit', $category->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Kategori">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.kategori-buku.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus kategori \'{{ $category->name }}\'?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Kategori">
                                                <i class="fa-solid fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                <i class="fa-solid fa-folder-open fs-1 text-muted mb-3 d-block"></i>
                                <p class="mb-2">Belum ada data kategori buku.</p>
                                <a href="{{ route('admin.kategori-buku.create') }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-plus me-1"></i> Tambah Sekarang
                                </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
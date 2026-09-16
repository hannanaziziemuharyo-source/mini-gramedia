@extends('layout.app')

@section('content')
<div class="container py-4">

    {{-- Alert Notifikasi Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-4 shadow-sm" role="alert">
            <div class="d-flex">
                <div class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                </div>
                <div>
                    <h4 class="alert-title mb-1">Berhasil!</h4>
                    <div class="text-secondary">{{ session('success') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible mb-4 shadow-sm" role="alert">
            <div class="d-flex">
                <div class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                </div>
                <div>
                    <h4 class="alert-title mb-1">Perhatian!</h4>
                    <div class="text-secondary">{{ session('error') }}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif

    {{-- Komponen Header Admin Navbar --}}
    <x-admin.navbar />

    {{-- Ringkasan Statistik Dashboard --}}
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <i class="fa-solid fa-book fs-3"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-secondary">Total Koleksi Buku</div>
                            <div class="text-dark fs-2 fw-bold">1.428 <span class="fs-5 text-muted fw-normal">Buku</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-success text-white avatar">
                                <i class="fa-solid fa-rupiah-sign fs-3"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-secondary">Pendapatan Bulan Ini</div>
                            <div class="text-dark fs-2 fw-bold">Rp 18.520.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-warning text-white avatar">
                                <i class="fa-solid fa-cart-shopping fs-3"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-secondary">Transaksi Selesai</div>
                            <div class="text-dark fs-2 fw-bold">342 <span class="fs-5 text-muted fw-normal">Pesanan</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card card-sm border-0 shadow-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-info text-white avatar">
                                <i class="fa-solid fa-users fs-3"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium text-secondary">Pelanggan Aktif</div>
                            <div class="text-dark fs-2 fw-bold">894 <span class="fs-5 text-muted fw-normal">User</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Konten Utama: Tabel Transaksi Terbaru & Buku Terlaris --}}
    <div class="row g-4">
        {{-- Kolom Kiri: Tabel Pesanan Terbaru --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom">
                    <h3 class="card-title m-0 text-dark fw-bold">
                        <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i> Transaksi & Pembelian Terbaru
                    </h3>
                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice</th>
                                <th>Pembeli</th>
                                <th>Buku / Paket</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="w-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold text-primary">#INV-20260901</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-xs bg-blue-lt">B</span>
                                        <span>Budi Santoso</span>
                                    </div>
                                </td>
                                <td>Atomic Habits (E-Book)</td>
                                <td class="fw-bold">Rp 88.000</td>
                                <td><span class="badge bg-success-lt">Selesai</span></td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-sm btn-ghost-primary" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-primary">#INV-20260902</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-xs bg-green-lt">S</span>
                                        <span>Siti Rahma</span>
                                    </div>
                                </td>
                                <td>Paket Langganan FICTION (30 Hari)</td>
                                <td class="fw-bold">Rp 49.000</td>
                                <td><span class="badge bg-success-lt">Selesai</span></td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-sm btn-ghost-primary" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-primary">#INV-20260903</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-xs bg-purple-lt">R</span>
                                        <span>Reza Pratama</span>
                                    </div>
                                </td>
                                <td>Filosofi Teras + Laut Bercerita</td>
                                <td class="fw-bold">Rp 175.000</td>
                                <td><span class="badge bg-warning-lt">Menunggu Pembayaran</span></td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-sm btn-ghost-primary" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-primary">#INV-20260904</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-xs bg-red-lt">A</span>
                                        <span>Andi Wijaya</span>
                                    </div>
                                </td>
                                <td>Paket Langganan NON-FICTION (30 Hari)</td>
                                <td class="fw-bold">Rp 49.000</td>
                                <td><span class="badge bg-success-lt">Selesai</span></td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-sm btn-ghost-primary" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-primary">#INV-20260905</td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="avatar avatar-xs bg-cyan-lt">D</span>
                                        <span>Dewi Lestari</span>
                                    </div>
                                </td>
                                <td>Negeri 5 Menara</td>
                                <td class="fw-bold">Rp 75.000</td>
                                <td><span class="badge bg-info-lt">Diproses</span></td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-sm btn-ghost-primary" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Aksi Cepat & Kategori Terlaris --}}
        <div class="col-lg-4">
            {{-- Card Aksi Cepat --}}
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title m-0 text-dark fw-bold">
                        <i class="fa-solid fa-bolt me-2 text-warning"></i> Menu Aksi Cepat
                    </h3>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <button type="button" class="btn btn-primary text-start d-flex align-items-center justify-content-between">
                        <span><i class="fa-solid fa-circle-plus me-2"></i> Tambah Buku Baru</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                        <span><i class="fa-solid fa-folder-plus me-2"></i> Tambah Kategori</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                        <span><i class="fa-solid fa-file-invoice-dollar me-2"></i> Laporan Rekap Penjualan</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                        <span><i class="fa-solid fa-tags me-2"></i> Kelola Voucher & Diskon</span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            {{-- Card Buku Best Seller Gramedia --}}
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h3 class="card-title m-0 text-dark fw-bold">
                        <i class="fa-solid fa-fire me-2 text-danger"></i> Buku Terlaris Minggu Ini
                    </h3>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center gap-3 py-3">
                        <span class="badge bg-danger text-white rounded-circle p-2">1</span>
                        <div class="flex-fill">
                            <div class="fw-bold text-dark">Atomic Habits</div>
                            <small class="text-secondary">James Clear • Self Development</small>
                        </div>
                        <span class="text-success fw-bold">241 Terjual</span>
                    </div>
                    <div class="list-group-item d-flex align-items-center gap-3 py-3">
                        <span class="badge bg-primary text-white rounded-circle p-2">2</span>
                        <div class="flex-fill">
                            <div class="fw-bold text-dark">Laut Bercerita</div>
                            <small class="text-secondary">Leila S. Chudori • Fiksi Sastra</small>
                        </div>
                        <span class="text-success fw-bold">198 Terjual</span>
                    </div>
                    <div class="list-group-item d-flex align-items-center gap-3 py-3">
                        <span class="badge bg-secondary text-white rounded-circle p-2">3</span>
                        <div class="flex-fill">
                            <div class="fw-bold text-dark">Filosofi Teras</div>
                            <small class="text-secondary">Henry Manampiring • Filsafat</small>
                        </div>
                        <span class="text-success fw-bold">165 Terjual</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

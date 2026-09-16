<div class="card mb-4 border-0 shadow-sm" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
    <div class="card-body py-3 px-4 text-white">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-white text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                    <i class="fa-solid fa-book-bookmark fs-3"></i>
                </div>
                <div>
                    <div class="d-flex align-items-center gap-2">
                        <h3 class="m-0 fw-bold text-white">Gramedia Admin Panel</h3>
                        <span class="badge bg-warning text-dark fw-bold">Admin Mode</span>
                    </div>
                    <small class="text-white-50">Kelola inventaris buku, kategori, transaksi, dan data pelanggan Gramedia E-Books</small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('home') }}" class="btn btn-sm btn-light text-primary fw-semibold">
                    <i class="fa-solid fa-store me-1"></i> Ke Toko Utama
                </a>
                <span class="text-white-50 d-none d-md-inline">|</span>
                <span class="text-white fw-medium d-none d-md-inline">
                    <i class="fa-solid fa-user-shield me-1"></i> {{ Auth::user()->name ?? 'Administrator' }}
                </span>
            </div>
        </div>

        {{-- Navigasi Menu Admin --}}
        <div class="d-flex flex-wrap gap-2 mt-3 pt-3 border-top border-white-50">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-light active">
                <i class="fa-solid fa-gauge-high me-1"></i> Dashboard
            </a>
            <a href="#" class="btn btn-sm btn-outline-light">
                <i class="fa-solid fa-book me-1"></i> Kelola Buku
            </a>
            <a href="{{ route('admin.kategori-buku.index') }}" class="btn btn-sm btn-outline-light {{ request()->routeIs('admin.kategori-buku.*') ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group me-1"></i> Kategori
            </a>
            <a href="#" class="btn btn-sm btn-outline-light">
                <i class="fa-solid fa-receipt me-1"></i> Transaksi
            </a>
            <a href="#" class="btn btn-sm btn-outline-light">
                <i class="fa-solid fa-crown me-1"></i> Paket Langganan
            </a>
            <a href="#" class="btn btn-sm btn-outline-light">
                <i class="fa-solid fa-users me-1"></i> Pengguna
            </a>
        </div>
    </div>
</div>

    <header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- BEGIN NAVBAR LOGO -->
        <a href="/" aria-label="Tabler" class="navbar-brand navbar-brand-autodark me-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOCvNa3r_hszq7pPtvOQKKYOepdqMsD5tJapqoyZoiAA&s=10"
                width="50" height="32" class="navbar-brand-image" alt="Tabler" />
            E-books
        </a>
        <!-- END NAVBAR LOGO -->

        <div class="navbar-nav mx-auto w-50 align-items-center flex-row">
            {{-- Dropdown Kategori --}}
            <div class="dropdown me-2">
                <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                <div class="dropdown-menu dropdown-menu-card" style="min-width: 600px">
                    <div class="p-2">
                        @php
                            $navCategories = \App\Models\BookCategory::all();
                        @endphp
                        @if($navCategories->isNotEmpty())
                            <div class="row g-2">
                                @foreach($navCategories as $navCat)
                                    <div class="col-3">
                                        <div class="card py-2">
                                            <div class="card-body p-2 text-center">
                                                <a href="#" class="text-reset d-block">{{ $navCat->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted text-center mb-0 py-2">Belum ada kategori tersedia</p>
                        @endif

                        {{-- Link khusus Admin --}}
                        @auth
                            @if(Auth::user()->role == 'admin')
                                <div class="border-top mt-2 pt-2">
                                    <a href="{{ route('admin.kategori-buku.index') }}" class="btn btn-sm btn-outline-primary w-100" id="link-kelola-kategori">
                                        <i class="fa-solid fa-gear me-1"></i> Kelola Semua Kategori
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            {{-- Search Bar --}}
            <div class="input-icon w-100">
                <input type="text" class="form-control form-control-rounded"
                    placeholder="Cari judul, produk, buku, penulis..." />
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </span>
            </div>

            {{-- Icon Keranjang --}}
            <div class="ms-3">
                <a href="#" class="text-dark">
                    <i class="fa-solid fa-cart-arrow-down fs-3"></i>
                </a>
            </div>
        </div>

        <div class="navbar-nav flex-row order-md-last ms-auto gap-2 align-items-center">
            @auth
                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-gauge me-1"></i> Admin Panel
                    </a>
                @endif
                <span class="d-none d-md-inline-block text-secondary me-2">
                    Halo, <strong class="text-dark">{{ Auth::user()->name }}</strong>
                </span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-light">Daftar</a>
            @endauth
        </div>
    </div>
</header>
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
                        <div class="row g-2">
                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        <a href="#" class="text-reset d-block">Kategori 1</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        <a href="#" class="text-reset d-block">Kategori 2</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        <a href="#" class="text-reset d-block">Kategori 3</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        <a href="#" class="text-reset d-block">Kategori 4</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        <div class="navbar-nav flex-row order-md-last ms-auto gap-2">
            <a href="#" class="btn btn-primary">Masuk</a>
            <a href="{{ route('register.store') }}" class="btn btn-light">Daftar</a>
        </div>
    </div>
</header>
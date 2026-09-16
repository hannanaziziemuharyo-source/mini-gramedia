{{-- NAVBAR --}}
        <ul class="navbar-nav mx-auto w-50">
            @if (Auth::check() && Auth::user()->role == "admin")
            <li class="nav-item-active">
                <a href="{{ route('admin.dashboard')}}" class="nav-link">Dashboard</a>
            </li>
                {{-- route()->routeIs : mengecek apakah route saat ini sesuai dengan route yg ditentukan.
                Fungsinya untuk memberikan class active yg nantinya akan berwarna biru pd link yg sedang aktif --}}
                <li class="nav-item">
                    <a href="{{ route('admin.kategori-buku.index')}}" class="nav-link {{request()
                    ->routeIs('admin.kategori-buku.index') ? 'active' : '' }}">Kategori Buku</a>
                </li>
                  <li class="nav-item">
                   <a href="{{ route('admin.paket-langganan.index') }}"
                    class="nav-link {{ request()->routeIs('admin.paket-langganan.index') ? 'active' : '' }}">
                        Paket Langganan</a>
                </li>
                  <li class="nav-item">
                    <a href="" class="nav-link">Buku</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pelanggan.create') }}" class="nav-link {{ request()->routeIs('admin.pelanggan.create') ? 'active' : '' }}">Pelanggan</a>
                </li>

            @else
            {{-- DROPDOWN KATEGORI --}}
            <div class="dropdown mt-2">

                <a
                    href="#"
                    class="btn btn-light dropdown-toggle pt-2 me-2"
                    data-bs-toggle="dropdown"
                >
                    Kategori
                </a>

                <div
                    class="dropdown-menu dropdown-menu-card"
                    style="min-width: 600px"
                >

                    <div class="p-3">

                        <div class="row g-2">

                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        Kategori 1
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        Kategori 2
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        Kategori 3
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card py-2">
                                    <div class="card-body p-2 text-center">
                                        Kategori 4
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endif
        </ul>
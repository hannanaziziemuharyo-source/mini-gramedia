@extends('layout.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        /* Styling panah biar rapi dan nyambung sama tema Tabler */
        .slick-prev,
        .slick-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #206bc4;
            /* Warna primary Tabler */
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .slick-prev:hover,
        .slick-next:hover {
            background-color: #1a569d;
            color: #fff;
        }

        .slick-prev {
            left: -15px;
        }

        .slick-next {
            right: -15px;
        }

        /* Kasih jarak antar card di dalam slider */
        .slick-slide {
            margin: 0 10px;
        }

        .slick-list {
            margin: 0 -10px;
        }
    </style>

    <div class="container py-4">
        {{-- Notifikasi Berhasil Login / Action Lainnya --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-4" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    </div>
                    <div>
                        <h4 class="alert-title">Berhasil!</h4>
                        <div class="text-secondary">{{ session('success') }}</div>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

         @if (session('error'))
            <div class="alert alert-danger alert-dismissible mb-4" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                    </div>
                    <div>
                        <h4 class="alert-title">Perhatian!</h4>
                        <div class="text-secondary">{{ session('error') }}</div>
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        {{-- CAROUSEL SAMPLE --}}
        <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt=""
                        src="https://img.magnific.com/free-vector/hand-drawn-literature-twitter-header_23-2149721049.jpg?semt=ais_hybrid&w=740&q=80" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://img.magnific.com/free-vector/hand-drawn-literature-twitter-header_23-2149721049.jpg?semt=ais_hybrid&w=740&q=80" />
                </div>
            </div>
            <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        {{-- DAFTAR LANGGANAN --}}
        <div class="mt-4">
            <h2 class="m-0 text-dark mb-3">Daftar Langganan</h2>
            @if (isset($subscriptionPackages) && $subscriptionPackages->count() > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis / Langganan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptionPackages as $package)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-secondary">Belum ada data langganan.</p>
            @endif
        </div>

        {{-- REKOMENDASI BUKU --}}
        <div class="mt-5 position-relative">
            <div class="d-flex align-items-center gap-2 mb-3">
                <span class="badge bg-blue text-blue-fg p-2"><i class="fa-solid fa-book fs-3"></i></span>
                <h2 class="m-0 text-dark">Rekomendasi Buku</h2>
            </div>

            <div class="book-slider px-3">
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 1">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Pertama">Judul Buku Pertama
                            </h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 1">Nama Penulis 1</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 2">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Kedua">Judul Buku Kedua</h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 2">Nama Penulis 2</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 3">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Ketiga">Judul Buku Ketiga
                            </h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 3">Nama Penulis 3</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 4">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Keempat">Judul Buku Keempat
                            </h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 4">Nama Penulis 4</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1525505927227-6b8c9c03b879?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 5">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Kelima">Judul Buku Kelima
                            </h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 5">Nama Penulis 5</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 6">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Keenam">Judul Buku Keenam
                            </h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 6">Nama Penulis 6</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 7">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Ketujuh">Judul Buku Ketujuh
                            </h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 7">Nama Penulis 7</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#" class="card card-link card-link-pop h-100 text-decoration-none text-dark">
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=300&h=450"
                            class="card-img-top" style="object-fit: cover; height: 220px;" alt="Cover Buku 8">
                        <div class="card-body p-2 text-center d-flex flex-column justify-content-center">
                            <h3 class="card-title mb-1 fs-5 text-truncate" title="Judul Buku Kedelapan">Judul Buku
                                Kedelapan</h3>
                            <p class="text-secondary fs-6 mb-0 text-truncate" title="Nama Penulis 8">Nama Penulis 8</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- buku gratis --}}
        <div class="mt-4">
            <div class="d-flex align-items-center gap-2 mb-4">
                <h2 class="mt-3 text-dark" style="font-weight: bold">Buku Gratis</h2>
            </div>

            <div class="row g-4">

                {{-- Card 1 --}}
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                        class="w-100 h-100 object-cover" alt="Card side image" />
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                            <span class="text-dark">Rp 0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                        class="w-100 h-100 object-cover" alt="Card side image" />
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                            <span class="text-dark">Rp 0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                        class="w-100 h-100 object-cover" alt="Card side image" />
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                            <span class="text-dark">Rp 0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                        class="w-100 h-100 object-cover" alt="Card side image" />
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                            <span class="text-dark">Rp 0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 5 --}}
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                        class="w-100 h-100 object-cover" alt="Card side image" />
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                            <span class="text-dark">Rp 0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 6 --}}
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                        class="w-100 h-100 object-cover" alt="Card side image" />
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                            <span class="text-dark">Rp 0</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-2">
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.book-slider').slick({
                infinite: true,
                slidesToShow: 5, // Jumlah buku nampil di Desktop
                slidesToScroll: 1, // Berapa buku yang geser tiap klik
                prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3, // Tablet
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2, // Mobile/HP
                        }
                    }
                ]
            });
        });
    </script>
@endsection

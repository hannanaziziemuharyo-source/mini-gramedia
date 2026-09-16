    @extends('layout.app')

    @section('content')
        <form action="{{ route('login.store') }}" method="POST" class="form-fieldset w-50 bg-white mx-auto mt-5">
            @csrf
            <h2 class="text-center mb-4">Login</h2>

            {{-- Notifikasi jika login gagal --}}
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
                        </div>
                        <div>
                            <h4 class="alert-title">Gagal!</h4>
                            <div class="text-secondary">{{ session('failed') }}</div>
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif

            {{-- Notifikasi jika berhasil register --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
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

            <div class="mb-3">
                <label class="form-label required">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="off" />
                @error('email')
                    {{-- memanggil error validasi @error('email') --}}
                    <div class="invalid-feedback d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        <strong>Email:</strong>&nbsp;{{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label required">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" />
                @error('password')
                    {{-- memanggil error validasi @error('password') --}}
                    <div class="invalid-feedback d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        <strong>Password:</strong>&nbsp;{{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="text-center text-muted mt-3">
                Belum punya akun? <a href="{{ route('register') }}" tabindex="-1">Daftar sekarang</a>
            </div>
        </form>
    @endsection
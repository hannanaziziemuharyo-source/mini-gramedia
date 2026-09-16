@extends('layout.app')

@section('content')
    <form action="{{route('register.store')}}" method="POST" class="form-fieldset w-50 bg-white mx-auto mt-5">
        @csrf
        <div class="mb-3">
            <label class="form-label required">Full name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off" value="{{ old('name') }}" />
            @error('name')
                {{-- memanggil error validasi @error('namainput') --}}
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label required">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" value="{{ old('email')}}" />
            @error('email')
                {{-- memanggil error validasi @error('emailinput') --}}
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" value="{{ old('password')}}" />
        </div>
        @error('password')
            {{-- memanggil error validasi @error('password') --}}
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" autocomplete="off" value="{{ old('password_confirmation')}}" />
        </div>
         </div>
        <button type="submit" class="btn btn-primary w-100">Buat Akun</button>
    </form>
@endsection

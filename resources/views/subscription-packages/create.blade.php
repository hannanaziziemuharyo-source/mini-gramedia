@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Paket Langganan</h2>
    <a href="{{ route('admin.paket-langganan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('admin.paket-langganan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Nama Paket</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description">Jenis / Langganan</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

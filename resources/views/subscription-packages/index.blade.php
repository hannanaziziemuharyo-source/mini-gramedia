@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Data Paket Langganan</h2>
    <a href="{{ route('admin.paket-langganan.create') }}" class="btn btn-primary mb-3">Tambah Paket Langganan</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="w-1 text-center">No</th>
                <th>Nama Paket</th>
                <th>Jenis / Langganan</th>
                <th class="w-1 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($packages->count() > 0)
                @foreach ($packages as $package)
                    <tr>
                        <td class="text-center text-secondary">{{ $loop->iteration }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->description }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.paket-langganan.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.paket-langganan.destroy', $package->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus paket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center py-4">Belum ada data paket langganan.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengumpulan Tugas</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Tugas</th>
                <th>Siswa</th>
                <th>Tanggal Pengumpulan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumpulans as $pengumpulan)
                <tr>
                    <td>{{ $pengumpulan->resource->name }}</td> {{-- Menggunakan resource sebagai pengganti tugas --}}
                    <td>{{ $pengumpulan->siswa->name }}</td>
                    <td>{{ $pengumpulan->created_at->format('d M Y, H:i') }}</td>
                    <td>
                        <a href="{{ route('pengumpulan.show', $pengumpulan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        @if (Auth::user()->is_guru || Auth::id() === $pengumpulan->user_id)
                            <a href="{{ route('pengumpulan.download', $pengumpulan->id) }}"
                                class="btn btn-success btn-sm">Download</a>
                            @if (Auth::user()->is_guru)
                                <a href="{{ route('pengumpulan.nilai', $pengumpulan->id) }}" class="btn btn-warning btn-sm">Berikan
                                    Nilai</a>
                            @endif
                        @endif
                        @if (Auth::id() === $pengumpulan->user_id)
                            <form action="{{ route('pengumpulan.destroy', $pengumpulan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Nilai untuk Pengumpulan: {{ $pengumpulan->judul }}</h2>

    <a href="{{ route('nilai.create', $pengumpulan->id) }}" class="btn btn-primary mb-3">Berikan Nilai</a>

    @if ($nilais->isEmpty())
        <p>Belum ada nilai untuk pengumpulan ini.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Nilai</th>
                    <th>Skor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilais as $nilai)
                    <tr>
                        <td>{{ $nilai->id }}</td>
                        <td>{{ $nilai->skor }}</td>
                        <td>
                            <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus nilai ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

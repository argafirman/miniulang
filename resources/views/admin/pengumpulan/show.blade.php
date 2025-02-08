@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pengumpulan Tugas</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $pengumpulan->resource->name }}</h4> {{-- Mengubah tugas ke resource --}}
            <p><strong>Siswa:</strong> {{ $pengumpulan->siswa->name }}</p>
            <p><strong>Deskripsi Tugas:</strong> {{ $pengumpulan->resource->desk }}</p> {{-- Mengubah tugas->deskripsi
            ke resource->desk --}}
            <p><strong>Tanggal Pengumpulan:</strong> {{ $pengumpulan->created_at->format('d M Y, H:i') }}</p>

            <div>
                <a href="{{ route('pengumpulan.download', $pengumpulan->id) }}" class="btn btn-success">
                    Download File Pengumpulan
                </a>
            </div>

            @if (Auth::user()->is_guru || Auth::id() === $pengumpulan->user_id)
                <form action="{{ route('pengumpulan.nilai', $pengumpulan->id) }}" method="POST" class="mt-3">
                    @csrf
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" name="nilai" id="nilai" class="form-control"
                            value="{{ old('nilai', $pengumpulan->nilai) }}" required min="0" max="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection

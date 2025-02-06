@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Berikan Nilai untuk Pengumpulan</h2>
    <form action="{{ route('nilai.store', $pengumpulan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="skor">Skor</label>
            <input type="number" name="skor" class="form-control" required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
    </form>
</div>
@endsection

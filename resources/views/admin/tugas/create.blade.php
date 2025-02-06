@extends('layouts.app')

@section('content')
<h1>Tambah Tugas</h1>
<form action="{{ route('tugas.store') }}" method="POST">
    @csrf
    <div>
        <label for="kelas_id">Pilih Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach($kelas as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="judul">Judul Tugas:</label>
        <input type="text" name="judul" id="judul" required>
    </div>
    <div>
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required></textarea>
    </div>
    <div>
        <label for="batas_waktu">Batas Waktu:</label>
        <input type="datetime-local" name="batas_waktu" id="batas_waktu" required>
    </div>
    <button type="submit">Simpan</button>
</form>
@endsection

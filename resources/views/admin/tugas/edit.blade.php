@extends('layouts.app')

@section('content')
<h1>Edit Tugas</h1>
<form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="kelas_id">Pilih Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach($kelas as $item)
                <option value="{{ $item->id }}" {{ $tugas->kelas_id == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="judul">Judul Tugas:</label>
        <input type="text" name="judul" id="judul" value="{{ $tugas->judul }}" required>
    </div>
    <div>
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" required>{{ $tugas->deskripsi }}</textarea>
    </div>
    <div>
        <label for="batas_waktu">Batas Waktu:</label>
        <input type="datetime-local" name="batas_waktu" id="batas_waktu"
            value="{{ date('Y-m-d\\TH:i', strtotime($tugas->batas_waktu)) }}" required>
    </div>
    <button type="submit">Update</button>
</form>
@endsection

@extends('layouts.app')

@section('content')
<h1>Tambah Materi</h1>
<form action="{{ route('materi.store') }}" method="POST">
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
        <label for="judul">Judul Materi:</label>
        <input type="text" name="judul" id="judul" required>
    </div>
    <div>
        <label for="konten">Konten Materi:</label>
        <textarea name="konten" id="konten" required></textarea>
    </div>
    <button type="submit">Simpan</button>
</form>
@endsection

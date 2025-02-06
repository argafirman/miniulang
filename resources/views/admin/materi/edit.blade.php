@extends('layouts.app')

@section('content')
<h1>Edit Materi</h1>
<form action="{{ route('materi.update', $materi->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="kelas_id">Pilih Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach($kelas as $item)
                <option value="{{ $item->id }}" {{ $materi->kelas_id == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="judul">Judul Materi:</label>
        <input type="text" name="judul" id="judul" value="{{ $materi->judul }}" required>
    </div>
    <div>
        <label for="konten">Konten Materi:</label>
        <textarea name="konten" id="konten" required>{{ $materi->konten }}</textarea>
    </div>
    <button type="submit">Update</button>
</form>
@endsection

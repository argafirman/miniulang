@extends('layouts.app')

@section('content')
<h1>Daftar Tugas</h1>
<a href="{{ route('tugas.create') }}">Tambah Tugas</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Kelas</th>
            <th>Batas Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tugas as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->kelas->nama }}</td>
                <td>{{ $item->batas_waktu }}</td>
                <td>
                    <a href="{{ route('tugas.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('tugas.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

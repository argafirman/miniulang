@extends('layouts.app')

@section('content')
<h1>Daftar Materi</h1>
<a href="{{ route('materi.create') }}">Tambah Materi</a>
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materi as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->kelas->nama }}</td>
                <td>
                    <a href="{{ route('materi.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('materi.destroy', $item->id) }}" method="POST" style="display:inline;">
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

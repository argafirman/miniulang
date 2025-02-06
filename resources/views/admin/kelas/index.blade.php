@extends('layouts.app')
@section('content')
<h1>Daftar Kelas</h1>
<a href="{{ route('admin.kelas.create') }}">Tambah Kelas</a>
<ul>
    @foreach ($kelas as $item)
        <li>{{ $item->nama }}
            <a href="{{ route('admin.kelas.edit', $item->id) }}">Edit</a>
            <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection

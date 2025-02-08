@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Resources</h2>
    <a href="{{ route('resources.create') }}" class="btn btn-primary mb-3">Tambah Resource</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Deadline</th>
                <th>Kelas</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->name }}</td>
                    <td>{{ $resource->desk }}</td>
                    <td>{{ $resource->deadline ?? '-' }}</td>
                    <td>{{ $resource->kelas->name }}</td>
                    <td>{{ ucfirst($resource->tipe) }}</td>
                    <td>
                        <a href="{{ route('resources.show', $resource->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('resources.edit', $resource->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('resources.destroy', $resource->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

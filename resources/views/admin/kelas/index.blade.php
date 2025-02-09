@extends('layouts.apptemplate')

@section('content')
<div class="max-w-4xl mx-auto mt-6">
    <h1 class="text-2xl font-bold text-center mb-6">Daftar Kelas</h1>

    <div class="flex justify-between mb-4">
        <a href="{{ route('admin.kelas.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">+ Tambah Kelas</a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3">No</th>
                    <th class="p-3">Nama Kelas</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $index => $item)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-3 text-center">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $item->nama }}</td>
                    <td class="p-3 flex gap-2 justify-center">
                        <a href="{{ route('admin.kelas.edit', $item->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

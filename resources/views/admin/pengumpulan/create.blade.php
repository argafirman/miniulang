@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pengumpulan Tugas: {{ $resource->name }}</h2> {{-- Mengubah tugas menjadi resource --}}

    <form action="{{ route('pengumpulan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="resource_id" value="{{ $resource->id }}"> {{-- Mengubah tugas_id menjadi resource_id
        --}}

        <div class="form-group">
            <label for="file">File Pengumpulan</label>
            <input type="file" name="file" id="file" class="form-control" required>
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Kirim Tugas</button>
    </form>
</div>
@endsection

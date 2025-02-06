@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pengumpulan Tugas: {{ $tugas->judul }}</h2>

    <form action="{{ route('pengumpulan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">

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

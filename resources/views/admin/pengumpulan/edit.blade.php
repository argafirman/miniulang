@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pengumpulan Tugas: {{ $pengumpulan->tugas->judul }}</h2>

    <form action="{{ route('pengumpulan.update', $pengumpulan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="file">File Pengumpulan</label>
            <input type="file" name="file" id="file" class="form-control">
            @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Perbarui Pengumpulan</button>
        </div>
    </form>
</div>
@endsection

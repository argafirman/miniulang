@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Resource</h2>
    <form action="{{ route('resources.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="desk" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Deadline</label>
            <input type="datetime-local" name="deadline" class="form-control">
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="form-control">
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control">
                <option value="materi">Materi</option>
                <option value="tugas">Tugas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

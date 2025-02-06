@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Nilai Pengumpulan</h2>
    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="skor">Skor</label>
            <input type="number" name="skor" class="form-control" value="{{ old('skor', $nilai->skor) }}" required
                min="0">
        </div>

        <button type="submit" class="btn btn-primary">Update Nilai</button>
    </form>
</div>
@endsection

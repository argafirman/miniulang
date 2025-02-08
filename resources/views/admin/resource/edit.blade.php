@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Resource</h2>
    <form action="{{ route('resources.update', $resource->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $resource->name }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="desk" class="form-control">{{ $resource->desk }}</textarea>
        </div>
        <div class="mb-3">
            <label>Deadline</label>
            <input type="datetime-local" name="deadline" class="form-control" value="{{ $resource->deadline }}">
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <select name="kelas_id" class="form-control">
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ $resource->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@extends('layouts.app')
@section('content')
<h1>Edit Kelas</h1>
<form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ $kelas->nama }}" required>
    <button type="submit">Update</button>
</form>
@endsection

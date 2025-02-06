@extends('layouts.app')
@section('content')
<h1>Tambah Kelas</h1>
<form action="{{ route('admin.kelas.store') }}" method="POST">
    @csrf
    <input type="text" name="nama" placeholder="Nama Kelas" required>
    <button type="submit">Simpan</button>
</form>
@endsection

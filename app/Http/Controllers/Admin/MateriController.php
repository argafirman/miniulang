<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    // Menampilkan daftar materi
    public function index()
    {
        $materi = Materi::with('kelas')->get();
        return view('admin.materi.index', compact('materi'));
    }

    // Menampilkan form untuk menambah materi
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.materi.create', compact('kelas'));
    }

    // Menyimpan data materi baru
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'judul'    => 'required|string|max:255',
            'konten'   => 'required',
        ]);

        Materi::create($request->all());
        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit materi
    public function edit(Materi $materi)
    {
        $kelas = Kelas::all();
        return view('admin.materi.edit', compact('materi', 'kelas'));
    }

    // Memperbarui data materi
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'judul'    => 'required|string|max:255',
            'konten'   => 'required',
        ]);

        $materi->update($request->all());
        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui');
    }

    // Menghapus materi
    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus');
    }
}
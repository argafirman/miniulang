<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tugas;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tugas = Tugas::with('kelas')->get();
        return view('tugas.index', compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('tugas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'kelas_id' => 'required|exists:kelas,id',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'batas_waktu' => 'required|date'
        ]);

        Tugas::create($request->all());
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tugas $tugas)
    {
        $kelas = Kelas::all();
        return view('tugas.edit', compact('tugas', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tugas $tugas)
    {
        $request->validate([
        'kelas_id' => 'required|exists:kelas,id',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'batas_waktu' => 'required|date'
        ]);

        $tugas->update($request->all());
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tugas $tugas)
    {
        $tugas->delete();
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus');
    }
}
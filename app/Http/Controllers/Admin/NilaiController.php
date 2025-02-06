<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nilai;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NilaiController extends Controller
{
    // Menampilkan form untuk memberikan nilai pada pengumpulan
    public function create($pengumpulanId)
    {
        $pengumpulan = Pengumpulan::findOrFail($pengumpulanId);
        return view('nilai.create', compact('pengumpulan'));
    }

    // Menyimpan nilai untuk pengumpulan
    public function store(Request $request, $pengumpulanId)
    {
        $request->validate([
            'skor' => 'required|integer|min:0',
        ]);

        $pengumpulan = Pengumpulan::findOrFail($pengumpulanId);

        // Menyimpan nilai
        $nilai = new Nilai();
        $nilai->pengumpulan_id = $pengumpulan->id;
        $nilai->skor = $request->skor;
        $nilai->save();

        return redirect()->route('pengumpulan.show', $pengumpulan->id)
                         ->with('success', 'Nilai berhasil diberikan!');
    }

    // Menampilkan nilai yang sudah diberikan
    public function show($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.show', compact('nilai'));
    }

    // Menampilkan form untuk mengubah nilai
    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
    }

    // Mengupdate nilai
    public function update(Request $request, $id)
    {
        $request->validate([
            'skor' => 'required|integer|min:0',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->skor = $request->skor;
        $nilai->save();

        return redirect()->route('pengumpulan.show', $nilai->pengumpulan_id)
                         ->with('success', 'Nilai berhasil diperbarui!');
    }

    // Menghapus nilai
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('pengumpulan.show', $nilai->pengumpulan_id)
                         ->with('success', 'Nilai berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengumpulanController extends Controller
{
    public function index()
    {
        $pengumpulans = Pengumpulan::with(['tugas', 'siswa'])->get();
        return view('pengumpulan.index', compact('pengumpulans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tugas_id' => 'required|exists:tugas,id',
            'file' => 'required|file|mimes:pdf,doc,docx,zip|max:5120', // Maksimal 5MB
        ]);

        $path = $request->file('file')->store('pengumpulan_tugas', 'public');

        Pengumpulan::create([
            'tugas_id' => $request->tugas_id,
            'user_id' => Auth::id(),
            'file_path' => $path,
        ]);

        return back()->with('success', 'Tugas berhasil dikumpulkan.');
    }

    public function show(Pengumpulan $pengumpulan)
    {
        return view('pengumpulan.show', compact('pengumpulan'));
    }

    public function download(Pengumpulan $pengumpulan)
    {
        // Pastikan hanya guru atau pemilik tugas yang bisa mengunduh
        if (!Auth::check() || (Auth::id() !== $pengumpulan->user_id && !Auth::user()->is_guru)) {
            abort(403, 'Unauthorized action.');
        }

        return Storage::download('public/' . $pengumpulan->file_path);
    }

    public function nilai(Request $request, Pengumpulan $pengumpulan)
    {
        $request->validate(['nilai' => 'required|integer|min:0|max:100']);
        $pengumpulan->update(['nilai' => $request->nilai]);
        return back()->with('success', 'Nilai berhasil diberikan.');
    }

    public function destroy(Pengumpulan $pengumpulan)
    {
        // Pastikan hanya pemilik tugas yang bisa menghapus
        if (!Auth::check() || Auth::id() !== $pengumpulan->user_id) {
            abort(403, 'Unauthorized action.');
        }

        Storage::delete('public/' . $pengumpulan->file_path);
        $pengumpulan->delete();

        return back()->with('success', 'Tugas berhasil dihapus.');
    }
}
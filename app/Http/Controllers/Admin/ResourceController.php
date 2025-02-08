<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('kelas')->get();
        return view('admin.resources.index', compact('resources'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.resources.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desk' => 'nullable',
            'deadline' => 'nullable|date',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe' => 'required|in:materi,tugas',
        ]);

        Resource::create($request->all());

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil ditambahkan!');
    }

    public function show(Resource $resource)
    {
        return view('admin.resources.show', compact('resource'));
    }

    public function edit(Resource $resource)
    {
        $kelas = Kelas::all();
        return view('admin.resources.edit', compact('resource', 'kelas'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'name' => 'required',
            'desk' => 'nullable',
            'deadline' => 'nullable|date',
            'kelas_id' => 'required|exists:kelas,id',
            'tipe' => 'required|in:materi,tugas',
        ]);

        $resource->update($request->all());

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil diperbarui!');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()->route('admin.resources.index')->with('success', 'Resource berhasil dihapus!');
    }
}
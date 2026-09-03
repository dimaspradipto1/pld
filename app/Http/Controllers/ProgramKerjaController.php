<?php

namespace App\Http\Controllers;

use App\DataTables\ProgramKerjaDataTable;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index(ProgramKerjaDataTable $dataTable)
    {
        return $dataTable->render('pages.program-kerja.index');
    }

    public function create()
    {
        return view('pages.program-kerja.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'            => 'required|string|max:255',
            'kategori'         => 'required|string|max:100',
            'deskripsi'        => 'required|string',
            'sasaran'          => 'nullable|string|max:255',
            'target_waktu'     => 'nullable|string|max:100',
            'penanggung_jawab' => 'nullable|string|max:150',
            'status'           => 'required|in:Direncanakan,Sedang Berjalan,Terlaksana',
            'urutan'           => 'nullable|integer',
            'is_active'        => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['urutan']    = $request->input('urutan', 0);

        ProgramKerja::create($validated);

        return redirect()->route('program-kerja.index')->with('success', 'Program Kerja berhasil ditambahkan.');
    }

    public function edit(ProgramKerja $program_kerja)
    {
        return view('pages.program-kerja.edit', compact('program_kerja'));
    }

    public function update(Request $request, ProgramKerja $program_kerja)
    {
        $validated = $request->validate([
            'judul'            => 'required|string|max:255',
            'kategori'         => 'required|string|max:100',
            'deskripsi'        => 'required|string',
            'sasaran'          => 'nullable|string|max:255',
            'target_waktu'     => 'nullable|string|max:100',
            'penanggung_jawab' => 'nullable|string|max:150',
            'status'           => 'required|in:Direncanakan,Sedang Berjalan,Terlaksana',
            'urutan'           => 'nullable|integer',
            'is_active'        => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;
        $validated['urutan']    = $request->input('urutan', 0);

        $program_kerja->update($validated);

        return redirect()->route('program-kerja.index')->with('success', 'Program Kerja berhasil diperbarui.');
    }

    public function destroy(ProgramKerja $program_kerja)
    {
        $program_kerja->delete();
        return redirect()->route('program-kerja.index')->with('success', 'Program Kerja berhasil dihapus.');
    }
}

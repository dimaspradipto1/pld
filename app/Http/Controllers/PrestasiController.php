<?php

namespace App\Http\Controllers;

use App\DataTables\PrestasiDataTable;
use App\Http\Requests\PrestasiRequest;
use App\Models\Prestasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PrestasiController extends Controller
{
    public function index(PrestasiDataTable $dataTable)
    {
        return $dataTable->render('pages.prestasi.index');
    }

    public function create(): View
    {
        return view('pages.prestasi.create');
    }

    public function store(PrestasiRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create($validated);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi mahasiswa berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi): View
    {
        return view('pages.prestasi.edit', compact('prestasi'));
    }

    public function update(PrestasiRequest $request, Prestasi $prestasi): RedirectResponse
    {
        $validated = $request->validated();
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('foto')) {
            if ($prestasi->foto && Storage::disk('public')->exists($prestasi->foto)) {
                Storage::disk('public')->delete($prestasi->foto);
            }
            $validated['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($validated);

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi mahasiswa berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi): RedirectResponse
    {
        if ($prestasi->foto && Storage::disk('public')->exists($prestasi->foto)) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()
            ->route('prestasi.index')
            ->with('success', 'Data prestasi mahasiswa berhasil dihapus.');
    }
}

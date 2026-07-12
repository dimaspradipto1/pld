<?php

namespace App\Http\Controllers;

use App\DataTables\LayananDataTable;
use App\Http\Requests\LayananRequest;
use App\Models\Layanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LayananController extends Controller
{
    public function index(LayananDataTable $dataTable)
    {
        return $dataTable->render('pages.layanan.index');
    }

    public function create(): View
    {
        return view('pages.layanan.create');
    }

    public function store(LayananRequest $request): RedirectResponse
    {
        Layanan::create($request->validated());

        alert()->success('Berhasil!', 'Layanan berhasil ditambahkan.');

        return redirect()->route('layanan.index');
    }

    public function edit(Layanan $layanan): View
    {
        return view('pages.layanan.edit', compact('layanan'));
    }

    public function update(LayananRequest $request, Layanan $layanan): RedirectResponse
    {
        $layanan->update($request->validated());

        alert()->success('Berhasil!', 'Layanan berhasil diperbarui.');

        return redirect()->route('layanan.index');
    }

    public function destroy(Layanan $layanan): RedirectResponse
    {
        $layanan->delete();

        alert()->success('Berhasil!', 'Layanan berhasil dihapus.');

        return redirect()->route('layanan.index');
    }
}

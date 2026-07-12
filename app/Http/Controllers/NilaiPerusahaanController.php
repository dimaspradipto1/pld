<?php

namespace App\Http\Controllers;

use App\DataTables\NilaiPerusahaanDataTable;
use App\Http\Requests\NilaiPerusahaanRequest;
use App\Models\NilaiPerusahaan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NilaiPerusahaanController extends Controller
{
    public function index(NilaiPerusahaanDataTable $dataTable)
    {
        return $dataTable->render('pages.nilaiperusahaan.index');
    }

    public function create(): View
    {
        return view('pages.nilaiperusahaan.create');
    }

    public function store(NilaiPerusahaanRequest $request): RedirectResponse
    {
        NilaiPerusahaan::create($request->validated());

        alert()->success('Berhasil!', 'Nilai perusahaan berhasil ditambahkan.');

        return redirect()->route('nilaiperusahaan.index');
    }

    public function edit(NilaiPerusahaan $nilaiperusahaan): View
    {
        return view('pages.nilaiperusahaan.edit', ['nilaiPerusahaan' => $nilaiperusahaan]);
    }

    public function update(NilaiPerusahaanRequest $request, NilaiPerusahaan $nilaiperusahaan): RedirectResponse
    {
        $nilaiperusahaan->update($request->validated());

        alert()->success('Berhasil!', 'Nilai perusahaan berhasil diperbarui.');

        return redirect()->route('nilaiperusahaan.index');
    }

    public function destroy(NilaiPerusahaan $nilaiperusahaan): RedirectResponse
    {
        $nilaiperusahaan->delete();

        alert()->success('Berhasil!', 'Nilai perusahaan berhasil dihapus.');

        return redirect()->route('nilaiperusahaan.index');
    }
}

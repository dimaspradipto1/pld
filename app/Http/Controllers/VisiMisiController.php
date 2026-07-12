<?php

namespace App\Http\Controllers;

use App\DataTables\VisiMisiDataTable;
use App\Http\Requests\VisiMisiRequest;
use App\Models\VisiMisi;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisiMisiController extends Controller
{
    public function index(VisiMisiDataTable $dataTable)
    {
        return $dataTable->render('pages.visimisi.index');
    }

    public function create(): View
    {
        return view('pages.visimisi.create');
    }

    public function store(VisiMisiRequest $request): RedirectResponse
    {
        VisiMisi::create($request->validated());

        alert()->success('Berhasil!', 'Data berhasil ditambahkan.');

        return redirect()->route('visimisi.index');
    }

    public function edit(VisiMisi $visimisi): View
    {
        return view('pages.visimisi.edit', ['visiMisi' => $visimisi]);
    }

    public function update(VisiMisiRequest $request, VisiMisi $visimisi): RedirectResponse
    {
        $visimisi->update($request->validated());

        alert()->success('Berhasil!', 'Data berhasil diperbarui.');

        return redirect()->route('visimisi.index');
    }

    public function destroy(VisiMisi $visimisi): RedirectResponse
    {
        $visimisi->delete();

        alert()->success('Berhasil!', 'Data berhasil dihapus.');

        return redirect()->route('visimisi.index');
    }
}

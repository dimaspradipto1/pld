<?php

namespace App\Http\Controllers;

use App\DataTables\StatistikMahasiswaDataTable;
use App\Http\Requests\StatistikMahasiswaRequest;
use App\Models\StatistikMahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StatistikMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StatistikMahasiswaDataTable $dataTable)
    {
        return $dataTable->render('pages.statistik-mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jenisDisabilitas = StatistikMahasiswa::listJenisDisabilitas();
        $fakultas = StatistikMahasiswa::listFakultas();

        return view('pages.statistik-mahasiswa.create', compact('jenisDisabilitas', 'fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatistikMahasiswaRequest $request): RedirectResponse
    {
        StatistikMahasiswa::create($request->validated());

        alert()->success('Berhasil!', 'Data mahasiswa berhasil ditambahkan.');

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatistikMahasiswa $admin_statistik_mahasiswa): View
    {
        $mahasiswa = $admin_statistik_mahasiswa;
        $jenisDisabilitas = StatistikMahasiswa::listJenisDisabilitas();
        $fakultas = StatistikMahasiswa::listFakultas();

        return view('pages.statistik-mahasiswa.edit', compact('mahasiswa', 'jenisDisabilitas', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatistikMahasiswaRequest $request, StatistikMahasiswa $admin_statistik_mahasiswa): RedirectResponse
    {
        $admin_statistik_mahasiswa->update($request->validated());

        alert()->success('Berhasil!', 'Data mahasiswa berhasil diperbarui.');

        return redirect()->route('admin-statistik-mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatistikMahasiswa $admin_statistik_mahasiswa): RedirectResponse
    {
        $admin_statistik_mahasiswa->delete();

        alert()->success('Berhasil!', 'Data mahasiswa berhasil dihapus.');

        return redirect()->route('admin-statistik-mahasiswa.index');
    }
}

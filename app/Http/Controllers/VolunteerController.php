<?php

namespace App\Http\Controllers;

use App\DataTables\VolunteerDataTable;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index(VolunteerDataTable $dataTable)
    {
        return $dataTable->render('pages.volunteer.index');
    }

    public function show(Volunteer $volunteer)
    {
        return view('pages.volunteer.show', compact('volunteer'));
    }

    public function updateStatus(Request $request, Volunteer $volunteer)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Review,Diterima,Ditolak',
        ]);

        $volunteer->update([
            'status' => $request->status,
        ]);

        return redirect()->route('volunteer.show', $volunteer->id)->with('success', 'Status relawan berhasil diperbarui.');
    }

    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('volunteer.index')->with('success', 'Data pendaftar volunteer berhasil dihapus.');
    }
}

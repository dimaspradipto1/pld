<?php

namespace Database\Seeders;

use App\Models\FacultyStat;
use Illuminate\Database\Seeder;

class FacultyStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacultyStat::truncate();

        FacultyStat::create([
            'title'           => 'PLD UIS Dalam Angka',
            'image'           => null,
            'jumlah_prodi'    => 4,
            'total_mahasiswa' => 128,
            'total_dosen'     => 65,
            'total_alumni'    => 320,
            'is_active'       => true,
        ]);
    }
}

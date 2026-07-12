<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Catatan: partner yang belum punya file logo di storage/app/public/partners
     * di-seed dengan `logo => null`. Lengkapi lewat menu admin Partner.
     */
    public function run(): void
    {
        $partners = [
            'Permata Hijau Group'       => 'partners/permata-hijau-group.png',
            'PT Hutama Karya (Persero)' => 'partners/hutama-karya.webp',
            'RS Awal Bros'              => 'partners/rs-awal-bros.png',
            'Pizza Hut'                 => 'partners/pizza-hut.png',
            'Atmindo Boiler Professionals' => null,
            'PNM (Permodalan Nasional Madani)' => null,
            'GNI Palm Plantation'       => null,
            'Darmex Plantation'         => null,
            'Kunango Jantan'            => null,
            'ASSA'                      => null,
            'Super Andalas Steel'       => null,
            'Indofood'                  => null,
            'Aulia Hospital'            => null,
            'MHE Demag'                 => null,
        ];

        $index = 0;
        foreach ($partners as $nama => $logo) {
            $index++;
            Partner::create([
                'nama'   => $nama,
                'logo'   => $logo,
                'urutan' => $index,
                'aktif'  => true,
            ]);
        }
    }
}

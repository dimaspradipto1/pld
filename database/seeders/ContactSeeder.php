<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'latitude'  => '-1.098300',
            'longitude' => '104.018000',
            'map'       => '<iframe src="https://www.google.com/maps?q=Tiban+Indah,+Sekupang,+Batam,+Kepulauan+Riau&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'no_wa'     => '6282280312127',
            'email'     => 'berkaryajasainspeksi@gmail.com',
            'alamat'    => 'Jl. Tiban Koperasi Blok D No. 57, Tiban Indah, Sekupang, Kepulauan Riau',
        ]);
    }
}
